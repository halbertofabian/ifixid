<?php

/**
 * Copia de seguridad y restauración de la base de datos
 * @author 
 * Class DatabaseTool
 */
class DatabaseTool
{
    private $handler;
    private $config = array(
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'database' => 'db_ifixit_clientes_1',
        'charset' => 'utf-8',
        'target' => 'respaldo_sql.sql'
    );
    private $tables = array();
    private $error;
    private $begin; // Hora de inicio

    /**
     * Método de arquitectura
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->begin = microtime(true);
        $config = is_array($config) ? $config : array();
        $this->config = array_merge($this->config, $config);
        // Iniciar conexión PDO
        if (!$this->handler instanceof PDO) {
            try {
                $this->handler = new PDO("mysql:host={$this->config['host']}:{$this->config['port']};dbname={$this->config['database']}", $this->config['user'], $this->config['password']);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return false;
            } catch (Exception $e) {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }

    /**
     * Apoyo
     * @param array $tables
     * @return bool
     */
    public function backup($tables = array())
    {
        // Matriz de declaraciones de definición de tabla de almacenamiento
        $ddl = array();
        // Matriz para almacenar datos
        $data = array();
        $this->setTables($tables);

        if (!empty($this->tables)) {
            foreach ($this->tables as $table) {
                $ddl[] = $this->getDDL($table);
                $data[] = $this->getData($table);
            }
            //Empieza a escribir

            //var_dump($data);
            $this->writeToFile($this->tables, $ddl, $data);
        } else {
            $this->error = '¡No hay tablas en la base de datos!';
            return false;
        }
    }

    /**
     * Ponga la mesa para realizar copias de seguridad
     * @param array $tables
     */
    private function setTables($tables = array())
    {
        if (!empty($tables) && is_array($tables)) {
            // Copia de seguridad de la tabla especificada
            $this->tables = $tables;
        } else {
            // Hacer una copia de seguridad de todas las tablas
            $this->tables = $this->getTables();
        }
    }

    /**
     * Consultar
     * @param string $sql
     * @return mixed
     */
    private function query($sql = '')
    {
        $stmt = $this->handler->query($sql);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $list = $stmt->fetchAll();
        return $list;
    }

    /**
     * Obtener todas las tablas
     * @return array
     */
    private function getTables()
    {
        $sql = 'SHOW TABLES';
        $list = $this->query($sql);
        $tables = array();
        foreach ($list as $value) {
            $tables[] = $value[0];
        }
        return $tables;
    }

    /**
     * Obtener la declaración de definición de la tabla
     * @param string $table
     * @return mixed
     */
    private function getDDL($table = '')
    {
        $sql = "SHOW CREATE TABLE `{$table}`";
        $ddl = $this->query($sql)[0][1] . ';';
        return $ddl;
    }

    /**
     * Obtener datos de la tabla
     * @param string $table
     * @return mixed
     */
    private function getData($table = '')
    {
        $sql = "SHOW COLUMNS FROM `{$table}`";
        $list = $this->query($sql);
        //Campo
        $columns = '';
        // El SQL a devolver
        $query = '';
        foreach ($list as $value) {
            $columns .= "`{$value[0]}`,";
        }
        $columns = substr($columns, 0, -1);
        $data = $this->query("SELECT * FROM `{$table}`");
        foreach ($data as $value) {
            $dataSql = '';
            foreach ($value as $v) {
                $dataSql .= "'{$v}',";
            }
            $dataSql = substr($dataSql, 0, -1);
            $query .= "INSERT INTO `{$table}` ({$columns}) VALUES ({$dataSql});\r\n";
        }
        return $query;
    }

    /**
     * Escribir archivo
     * @param array $tables
     * @param array $ddl
     * @param array $data
     */
    private function writeToFile($tables = array(), $ddl = array(), $data = array())
    {
        $str = "/*\r\nMySQL Database Backup Tools\r\n";
        $str .= "Server:{$this->config['host']}:{$this->config['port']}\r\n";
        $str .= "Database:{$this->config['database']}\r\n";
        $str .= "Data:" . date('Y-m-d H:i:s', time()) . "\r\n*/\r\n";
        $str .= "SET FOREIGN_KEY_CHECKS=0;\r\n";
        $i = 0;
        foreach ($tables as $table) {
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Table structure for {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "DROP TABLE IF EXISTS `{$table}`;\r\n";
            $str .= $ddl[$i] . "\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= "-- Records of {$table}\r\n";
            $str .= "-- ----------------------------\r\n";
            $str .= $data[$i] . "\r\n";
            $i++;
        }
        echo file_put_contents($this->config['target'], $str) ? '¡Copia de seguridad exitosa! Toma tiempo' . (microtime(true) - $this->begin) . 'ms' : '¡Error de copia de seguridad!';
    }

    /**
     * Mensaje de error
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    public function restore($path = '')
    {
        if (!file_exists($path)) {
            $this->error = '¡El archivo SQL no existe!';
            return false;
        } else {
            $sql = $this->parseSQL($path);
            try {
                $this->handler->exec($sql);
                echo '¡Restauración exitosa! Toma tiempo', (microtime(true) - $this->begin) . 'ms';
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                return false;
            }
        }
    }

    /**
     * Analizar el archivo SQL en una matriz de declaraciones SQL
     * @param string $path
     * @return array|mixed|string
     */
    private function parseSQL($path = '')
    {
        $sql = file_get_contents($path);
        $sql = explode("\r\n", $sql);
        // Primero eliminar - comentar
        $sql = array_filter($sql, function ($data) {
            if (empty($data) || preg_match('/^--.*/', $data)) {
                return false;
            } else {
                return true;
            }
        });
        $sql = implode('', $sql);
        //Eliminar comentario
        $sql = preg_replace('/\/\*.*\*\//', '', $sql);
        return $sql;
    }
}
