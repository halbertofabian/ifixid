<?php
// http://localhost/softmorpos.com/softmor/public/api/v1/sucursal_all/ki

$url = URL_IFIXID.'softmor/public/api/v1/sucursal_all/'.$url_negocio;
$res = file_get_contents($url);
$scl_info = json_decode($res, true);

print_r($scl_info);

// preArray($url_negocio);

?>
<div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(<?= $scl_info['scl_portada'] ?>);">
        </div>
        <!--/.bg-holder-->

        <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="<?= $scl_info['scl_logo'] ?>" width="200" alt="" /></div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="mb-1"> <?= $scl_info['scl_nombre_negocio'] ?><span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                </h4>
                <h5 class="fs-0 fw-normal "><?= $scl_info['scl_descripción_negocio'] ?></h5>
                <p class="text-400 fw-bold ">  <?= $scl_info['scl_delegacion_municipio'].', '.$scl_info['scl_estado'] ?></p>
                <!-- <button class="btn btn-falcon-primary btn-sm px-3 mt-1" type="button">Llamar</button>
                <button class="btn btn-falcon-default btn-sm px-3 ms-2 mt-1" type="button">Enviar Whatsapp</button><br>
                <button class="btn btn-falcon-default btn-sm px-3 ms-2 mt-3" type="button">Solicitar una cotización</button> -->

                <!-- <div class="border-bottom border-dashed my-4 d-lg-none"></div> -->
            </div>
            <div class="col-lg-4">
                <div class="row justify-content-center">
                    <div class="col-8 ps-2 ps-lg-3">
                       
                        <!-- <hr class="border-top border-dashed" /> -->
                        <h6 class=" text-center">Siguenos en redes sociales</h6>
                        <div class="d-flex gap-2 text-center">
                            <button class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-facebook-f mr-1 text-primary"></span></button>
                            <button class="btn btn-falcon-default icon-item fs--2 icon-item-lg "><span class="fs-0 fab fa-twitter mr-1 text-twitter"></span></button>
                            <button class="btn btn-falcon-default icon-item fs--2 icon-item-lg "><span class="fs-0 fab fa-google-plus-g mr-1 text-google-plus"></span></button>
                            <button class="btn btn-falcon-default icon-item fs--2 icon-item-lg "><span class="fs-0 fab fa-linkedin-in mr-1 text-info"></span></button>
                            
                       
                        </div>
                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>