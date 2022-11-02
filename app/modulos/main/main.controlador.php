
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
class MainControlador
{
    public function ctrAgregarMain()
    {
    }
    public function ctrActualizarMain()
    {
    }
    public function ctrMostrarMain()
    {
    }
    public function ctrEliminarMain()
    {
    }
    public static function getEstadoServicios($estado)
    {
        switch ($estado) {
            case "Entregado":
                # code...
                $get_estado = '<sapan class="badge bg-success">Entregado</sapan>';
                break;
            case "Reparación":
                # code...
                 $get_estado = '<sapan class="badge bg-info">Reparación</sapan>';
                break;
            case "Reparacion":
                # code...
                 $get_estado = '<sapan class="badge bg-info">Reparación</sapan>';
                break;
            case "Reparado":
                # code...
                $get_estado = '<sapan class="badge bg-primary">Reparado</sapan>';
                break;
            case "No quedo":
                # code...
                $get_estado = '<sapan class="badge bg-danger">No quedo</sapan>';
                break;
            case "Laboratorio":
                # code...
                $get_estado = '<sapan class="badge bg-warning">Laboratorio</sapan>';
                break;
            case "Entregado no quedo":
                # code...
                $get_estado = '<sapan class="badge bg-dark">Entregado no quedo</sapan>';
                break;
            default:
                # code...
                $get_estado = '<sapan class="badge bg-warning">Laboratorio</sapan>';
                break;
        }
        return $get_estado;
    }
}
