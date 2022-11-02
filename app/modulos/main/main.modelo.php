
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/11/2022 10:34
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.ifixit.php";
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.softmor.php";

class MainModelo
{
    public static function mdlAgregarMain()
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
    public static function mdlActualizarMain()
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
    public static function mdlMostrarMain()
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
    public static function mdlEliminarMain()
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


