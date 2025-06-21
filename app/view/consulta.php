<?php
$scl_id_sucursal_sp = explode('/', $_GET['store'])[1];
$url = URL_IFIXID . 'softmor/public/api/v1/sucursal_all_id/' . $scl_id_sucursal_sp;
$res = file_get_contents($url);
$scl_info = json_decode($res, true);
if ($scl_info) :
    // preArray($scl_info['scl_dominio'] . '/' . explode('/', $_GET['store'])[2]);
    header('Location: ' . $scl_info['scl_dominio'] . '/' . explode('/', $_GET['store'])[2]);
else :
?>

    <div class="card mb-3">
        <div class="card-header bg-light">
            <h5 class="mb-0 text-center">¡Entérate del estado de tu servicio!</h5>
        </div>
        <div class="card-body text-justify">
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="hidden" id="scl_id_sucursal_sp" value="<?= explode('/', $_GET['store'])[1] ?>">
                        <input type="text" class="form-control" id="srv_codigo" placeholder="Ingresa el código del servicio" value="<?= isset(explode('/', $_GET['store'])[2]) ? explode('/', $_GET['store'])[2] : '' ?>" aria-label="Ingresa el código del servicio" aria-describedby="button-addon2">
                        <button class="btn btn-dark btnConsultarInfo" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center text-muted d-none status-empty">
            El código de servicio no existe.
        </div>
        <div class="card-footer bg-light p-0 border-top d-none statusInfo">
            <?php include_once 'app/view/status.php'; ?>
        </div>
    </div>
    <?php if (isset(explode('/', $_GET['store'])[1])) : ?>
        <script>
            $(document).ready(function() {
                var srv_codigo = $("#srv_codigo").val();
                var scl_id_sucursal_sp = $("#scl_id_sucursal_sp").val();

                var res = obtenerInformacion(srv_codigo, scl_id_sucursal_sp);
                if (res.status) {
                    $(".statusInfo").removeClass("d-none");
                    $(".status-empty").addClass("d-none");
                } else {
                    $(".statusInfo").addClass("d-none");
                    $(".status-empty").removeClass("d-none");
                }
            })
        </script>
<?php endif;
endif; ?>