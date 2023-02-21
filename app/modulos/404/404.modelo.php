
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/01/2023 13:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.ifixit.php";
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.softmor.php";

class _404Modelo
{
    public static function mdlAgregar404()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizar404()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrar404()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminar404()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}


