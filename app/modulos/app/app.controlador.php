
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/01/2023 13:25
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class AppControlador
{
    public function ctrAgregarApp()
    {
    }
    public function ctrActualizarApp()
    {
    }
    public function ctrMostrarApp()
    {
    }
    public function ctrEliminarApp()
    {
    }

    public static function obtenerListaAdministradores()
    {
        if (URL_SHOPBETLE == HTTP_HOST) {
            return array(
                'tienda'

            );
        } else if (URL_IFIXID == HTTP_HOST) {
            return array(
                'ifx',
            );
        }
    }

    public static function coloresAleatorios($random)
    {
        switch ($random) {
            case 1:
                $color = "primary";
                break;
            case 2:
                $color = "secondary";
                break;
            case 3:
                $color = "success";
                break;
            case 4:
                $color = "info";
                break;
            case 5:
                $color = "warning";
                break;
            case 6:
                $color = "danger";
                break;
            case 7:
                $color = "dark dark__bg-dark";
                break;
            case 8:
                $color = "dark";
                break;

            default:
                # code...
                break;
        }
        return $color;
    }
}
