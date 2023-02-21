<?php
// http://localhost/softmorpos.com/softmor/public/api/v1/sucursal_all/ki

// preArray($_GET);
$ifx_negocio = explode('/', $_GET['ruta'])[0];
$url = URL_IFIXID . 'softmor/public/api/v1/sucursal_all/' . $ifx_negocio;
$res = file_get_contents($url);
$scl_info = json_decode($res, true);

if ($scl_info) :
    $url_links = URL_IFIXID . 'softmor/public/api/v1/links/all/'.$scl_info['scl_id'];
    $links = json_decode(file_get_contents($url_links),true);
?>

    <div class="content">
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
                        <p class="text-400 fw-bold "> <?= $scl_info['scl_delegacion_municipio'] . ', ' . $scl_info['scl_estado'] ?></p>
                        <!-- <button class="btn btn-falcon-primary btn-sm px-3 mt-1" type="button">Llamar</button>
                <button class="btn btn-falcon-default btn-sm px-3 ms-2 mt-1" type="button">Enviar Whatsapp</button><br>
                <button class="btn btn-falcon-default btn-sm px-3 ms-2 mt-3" type="button">Solicitar una cotización</button> -->

                        <!-- <div class="border-bottom border-dashed my-4 d-lg-none"></div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="row justify-content-center">
                            <div class="col-8 ps-2 ps-lg-3">

                                <?php

                                $rds = json_decode($scl_info['scl_redes_sociales'], true);


                                $facebook = explode('https://facebook.com/', $rds['facebook'])[1];
                                $instagram = explode('https://instagram.com/', $rds['instagram'])[1];
                                $linkedin = explode('https://www.linkedin.com/', $rds['linkedin'])[1];
                                $twitter = explode('https://twitter.com/', $rds['twitter'])[1];
                                $youtube = explode('https://www.youtube.com/', $rds['youtube'])[1];
                                $tiktok = explode('https://www.tiktok.com/', $rds['tiktok'])[1];



                                ?>

                                <!-- <hr class="border-top border-dashed" /> -->
                                <h6 class=" text-center">Siguenos en redes sociales</h6>
                                <div class="d-flex gap-2 text-center">
                                    <?php
                                    echo $facebook = $facebook != '' ? '<a href="' . $rds['facebook'] . '" target="_blank" title="Facebook" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-facebook-f mr-1 text-primary"></span></a>' : '';
                                    echo $instagram = $instagram != '' ? '<a href="' . $rds['instagram'] . '" target="_blank" title="Instagram" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-instagram mr-1 text-warning"></span></a>' : '';
                                    echo $linkedin = $linkedin != '' ? '<a href="' . $rds['linkedin'] . '" target="_blank" title="LinkedIn" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-linkedin-in mr-1 text-info"></span></a>' : '';
                                    echo $twitter = $twitter != '' ? '<a href="' . $rds['twitter'] . '" target="_blank" title="Twitter" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-twitter mr-1 text-twitter"></span></a>' : '';
                                    echo $youtube = $youtube != '' ? '<a href="' . $rds['youtube'] . '" target="_blank" title="YouTube" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-youtube mr-1 text-youtube"></span></a>' : '';
                                    echo $tiktok = $tiktok != '' ? '<a href="' . $rds['tiktok'] . '" target="_blank" title="TikTok" class="btn btn-falcon-default icon-item fs--2 icon-item-lg"><span class="fs-0 fab fa-tiktok mr-1 text-tiktok"></span></a>' : '';
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0 text-center">¡Entérate del estado de tu servicio!</h5>
                    </div>
                    <div class="card-body text-justify">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Ingresa el código del servicio" aria-label="Ingresa el código del servicio" aria-describedby="button-addon2">
                                    <button class="btn btn-dark" type="button" id="button-addon2">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light p-0 border-top">
                    </div>
                </div>
                <div class="card mb-3 p-3">
                    <div class="card-body fs--1 pb-0">
                        <div class="row justify-content-center">
                            <?php
                                foreach ($links as  $link):
                            ?>
                            <div class="col-md-5 col-12 m-2 card ">
                                <div class="d-flex position-relative align-items-center mt-3 mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="<?= $link['lks_icono'] ?>" alt="" width="50" />
                                    <div class="flex-1">
                                        <h6 class="fs-0 mb-0 text-center"><a class="stretched-link text-decoration-none text-dark " href="<?= $link['lks_url'] ?>" target="_blank" > <strong style="font-size:16px"> <?= $link['lks_descripcion'] ?> </strong></a></h6>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <input type="hidden" name="ctn_id_suscursal" id="ctn_id_suscursal" value="<?= $scl_info['scl_id'] ?>">
                    <input type="hidden" name="ctn_suscriptor" id="ctn_suscriptor" value="<?= $scl_info['scl_suscriptor'] ?>">

                    <form id="formCotizacion" method="post">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0 text-center">Solicita una cotización</h5>

                            </div>
                            <div class="card-body text-justify">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ctn_nombre">Nombre <?= OBL ?></label>
                                            <input type="text" name="ctn_nombre" id="ctn_nombre" class="form-control" placeholder="Ingresa tu nombre" required>
                                            <!-- <small id="helpId" class="text-muted">Help text</small> -->

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ctn_medio_contacto">Medio de contacto <?= OBL ?> <br>
                                                <small id="helpId" class="text-muted">Indica cómo prefieres ser contactado.</small>
                                            </label>
                                            <select name="ctn_medio_contacto" id="ctn_medio_contacto" class="form-control" required>
                                                <option value=""></option>
                                                <option value="W">WhatsApp</option>
                                                <option value="T">Teléfono</option>
                                                <option value="C">Correo</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-12 mt-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="ctn_contacto" name="ctn_contacto" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Equipo</label>
                                        <input type="text" name="ctn_equipo" id="ctn_equipo" class="form-control" placeholder="Marca y modelo">
                                    </div>
                                    <div class="col-12">
                                        <label for="ctn_descripcion">Descripción</label>
                                        <textarea class="form-control" name="ctn_descripcion" id="ctn_descripcion" cols="30" rows="3"></textarea>
                                        <small id="helpId" class="text-muted">Describe lo que te gustaría cotizar</small>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-end">Solicitar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="card mb-3">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Somos especialistas en</h5>
                        </div>
                        <div class="card-body fs--1">
                            <div class="d-flex">
                                <div class="flex-1 position-relative ps-3">
                                    <span class="badge rounded-pill badge-soft-primary">Android</span>
                                    <span class="badge rounded-pill badge-soft-secondary">ios</span>
                                    <span class="badge rounded-pill badge-soft-success">Mac</span>
                                    <span class="badge rounded-pill badge-soft-info">Software</span>
                                    <span class="badge rounded-pill badge-soft-warning">Administación de correos</span>
                                    <span class="badge rounded-pill badge-soft-danger">Hardware</span>
                                    <span class="badge rounded-pill badge-soft-dark dark__bg-dark">Xbox</span>
                                    <span class="badge rounded-pill badge-soft-dark">Play station</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container">
        <div class="row flex-center min-vh-100 py-6 text-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="fw-black lh-1 text-300 fs-error">404</div>
                        <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">La página que estás buscando no se encuentra.</p>
                        <hr />
                        <p>Asegúrate de que la dirección sea correcta y que la página no se haya movido. Si cree que se trata de un error, póngase en contacto <a href="mailto:hola@softmor.com">con nosotros</a>.</p><a class="btn btn-primary btn-sm mt-3" href="<?= HTTP_HOST ?>"><span class="fas fa-home me-2"></span>Ir al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function() {

    })

    $("#ctn_medio_contacto").on('change', function() {

        var opc = $(this).val();
        if (opc == 'W') {
            $("#ctn_contacto").attr("placeholder", 'Introduce el número de WhatsApp');
            $("#ctn_contacto").attr("type", 'number');

        } else if (opc == 'T') {
            $("#ctn_contacto").attr("placeholder", 'Introduce el número de Teléfono');
            $("#ctn_contacto").attr("type", 'number');

        } else if (opc == 'C') {
            $("#ctn_contacto").attr("placeholder", 'Introduce tu correo electrónico');
            $("#ctn_contacto").attr("type", 'email');

        } else {
            $("#ctn_contacto").attr("placeholder", '');
            $("#ctn_contacto").attr("type", 'text');
        }

        $("#ctn_contacto").focus();
    })

    $("#formCotizacion").on('submit', function(e) {
        e.preventDefault();


        // alert("ok")
        var datos = new FormData(this)
        datos.append("ctn_id_suscursal", $("#ctn_id_suscursal").val());
        datos.append("ctn_suscriptor", $("#ctn_suscriptor").val());
        $.ajax({
            url: urlAPI + 'softmor/public/api/v1/cotizaciones/guardar',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {

            },
            success: function(res) {
                console.log(res);
                if (res.status) {
                    swal("¡Muy bien!", res.mensaje, "success");
                    $("#formCotizacion")[0].reset();
                } else {
                    swal("¡Error!", res.mensaje, "success");

                }
            }
        });
    })
</script>