<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Profile - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="<?= HTTP_HOST . 'app/' ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= HTTP_HOST . 'app/' ?>app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/css/pages/page-profile.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>app-assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- END: Custom CSS-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-fixed  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <?php
    // Aquí va a air la primera validación para saber si es una url del cliente o de ifixid

    // Validación de página de consulta

    $p_consulta = false;
    $rutas = array();
    if (isset($_GET['ruta'])) {
        $rutas = explode('/', $_GET['ruta']);
        if (isset($rutas[0])) {
            if ($rutas[0] == 'st' && isset($rutas[1])) {
                // consultar api
                $res_data = json_decode(file_get_contents(URL_API . "get-data-service/" . $rutas[1]), true);
                // preArray($res_data);
                $data_servicio = $res_data[0]['data_service'];
                $data_suc = $res_data[0]['data_sucursal'];
                $data_notas = $res_data[0]['data_notas'];
                $data_evidencia = $res_data[0]['data_evidences'];
                // preArray($data_suc);

                $p_consulta = true;
            } else {
                header('Location: ' . HTTP_HOST);
            }
        } else {
            header('Location: ' . HTTP_HOST);
        }
    }
    ?>

    <?php if ($p_consulta) : ?>
        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">

            <!-- <div class="urlApp" urlApp="<?= HTTP_HOST ?>" ></div> -->
            <div class="urlApp" urlApp="<?php echo HTTP_HOST ?>"></div>
            <!-- <strong>IFIX ID</strong> -->
            <div class="navbar-container d-flex content">
                <strong><?= $data_suc['scl_nombre'] ?></strong>
                <!-- <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul>
            </div> -->
                <ul class="nav navbar-nav align-items-center ml-auto">
                    <!-- <strong>IFIX ID</strong> -->
                    <li class="nav-item dropdown dropdown-language">
                        <!-- <strong>IFIX ID</strong> -->
                        <!-- <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="javascript:void(0);" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="javascript:void(0);" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="javascript:void(0);" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="javascript:void(0);" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div> -->
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <!-- <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a> -->
                    </li>
                    <li class="nav-item nav-search">
                        <!-- <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a> -->
                        <!-- <div class="search-input">
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div> -->
                    </li>
                    <li class="nav-item dropdown dropdown-cart mr-25">
                        <a class="nav-link" target="_blank" href="https://wa.me/<?= $data_suc['scl_codigo_pais'] . '' . $data_suc['scl_whatsapp'] ?>">

                            <!-- <i class="ficon" data-feather='message-square'></i> -->
                            <i class=" ficon fab fa-whatsapp"></i>

                        </a>

                    </li>
                    <li class="nav-item dropdown dropdown-notification mr-25">
                        <a class="nav-link" href="tel:<?= $data_suc['scl_telefono_fijo'] ?>">

                            <i class="ficon fas fa-phone-square"></i>
                        </a>

                    </li>
                    <!-- <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                    <!-- <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">John Doe</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="<?= HTTP_HOST . 'app/' ?>app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span> -->
                    <!-- </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a><a class="dropdown-item" href="page-auth-login-v2.html"><i class="mr-50" data-feather="power"></i> Logout</a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- <ul class="main-search-list-defaultlist d-none">
            <li class="d-flex align-items-center"><a href="javascript:void(0);">
                    <h6 class="section-label mt-75 mb-0">Files</h6>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                    <div class="d-flex">
                        <div class="mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/icons/xls.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                    <div class="d-flex">
                        <div class="mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                    <div class="d-flex">
                        <div class="mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
                    <div class="d-flex">
                        <div class="mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/icons/doc.png" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                        </div>
                    </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
                </a></li>
            <li class="d-flex align-items-center"><a href="javascript:void(0);">
                    <h6 class="section-label mt-75 mb-0">Members</h6>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                        </div>
                    </div>
                </a></li>
            <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
                    <div class="d-flex align-items-center">
                        <div class="avatar mr-75"><img src="<?= HTTP_HOST . 'app/' ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                        <div class="search-data">
                            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                        </div>
                    </div>
                </a></li>
        </ul> -->
        <!-- <ul class="main-search-list-defaultlist-other-list d-none">
            <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                    <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
                </a></li>
        </ul> -->
        <!-- END: Header-->
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <!-- <div class="content-overlay"></div> -->
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">

                <div class="content-body">
                    <div id="user-profile">
                        <!-- profile header -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card profile-header mb-2">
                                    <!-- profile cover photo -->
                                    <img class="card-img-top" src="<?= HTTP_HOST ?>app/app-assets/images/svg/spr.svg" alt="User Profile Image" />
                                    <!--/ profile cover photo -->

                                    <div class="position-relative">
                                        <!-- profile picture -->
                                        <div class="profile-img-container d-flex align-items-center">
                                            <div class="profile-img">
                                                <img src="<?= $data_suc['ruta_logo'] ?>" width="100%" height="100%" class="rounded img-fluid" alt="Card image" />
                                            </div>
                                            <!-- profile title -->
                                            <div class="profile-title ml-3">
                                                <!-- <h2 class="text-white">LAP TAB CEL</h2> -->
                                                <!-- <p class="text-white">LAPTABCEL</p> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- tabs pill -->
                                    <div class="profile-header-nav">
                                        <!-- navbar -->
                                        <nav class="mt-2 navbar navbar-expand-md navbar-light justify-content-center justify-content-md-between w-100">

                                            <?= $data_suc['scl_calle'] . ' ' . $data_suc['scl_no_exterior'] . ' ' . $data_suc['scl_no_interior'] . ' ' . ' ' . $data_suc['scl_colonia'] . ' ' . $data_suc['scl_delegacion_municipio'] . ' ' . $data_suc['scl_codigo_postal'] . ' ' . $data_suc['scl_estado'] ?>
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">

                                                    <?php

                                                    $rds =  json_decode($data_suc['scl_redes_sociales'], true);

                                                    ?>
                                                    <?php if ($rds['facebook'] != '') : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link  " href="<?= $rds['facebook'] ?>" target="_blank">
                                                                <i class="fab fa-facebook" style="font-size: 22px;"></i>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if ($rds['instagram'] != '') : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link  " href="<?= $rds['instagram'] ?>" target="_blank">
                                                                <i class="fab fa-instagram" style="font-size: 22px;"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if ($rds['youtube'] != '') : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link  " href="<?= $rds['youtube'] ?>" target="_blank">
                                                                <i class="fab fa-youtube" style="font-size: 22px;"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if ($rds['tiktok'] != '') : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link  " href="<?= $rds['tiktok'] ?>" target="_blank">
                                                                <i class="fab fa-tiktok" style="font-size: 22px;"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if ($rds['twitter'] != '') : ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link  " href="<?= $rds['twitter'] ?>" target="_blank">
                                                                <i class="fab fa-twitter" style="font-size: 22px;"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>
                                                <!-- edit button -->
                                                <!-- <button class="btn btn-primary">
                                                    <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="font-weight-bold d-none d-md-block">Edit</span>
                                                </button> -->
                                            </div>

                                            <!-- <p></p> -->
                                            <!-- <button class="btn btn-icon navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button> -->

                                            <!-- collapse  -->
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                            </div>
                                            <!--/ collapse  -->
                                        </nav>
                                        <!--/ navbar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ profile header -->

                        <!-- profile info section -->
                        <section id="profile-info">
                            <div class="row">
                                <!-- left profile info section -->
                                <div class="col-lg-2 col-12 order-2 order-lg-1">

                                </div>

                                <!--/ left profile info section -->

                                <div class="col-lg-8 col-12 order-1 order-lg-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Proceso</button>
                                                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Evidencias</button>
                                                    <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Detalles</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="timeline">
                                                                <?php foreach ($data_notas as $key => $nts) : ?>
                                                                    <li class="timeline-item">
                                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                                        <div class="timeline-event">
                                                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                                <!-- <h6>12 Invoices have been paid</h6> -->
                                                                                <span class="timeline-event-time"><?= $nts['nts_fecha_creacion'] ?></span>
                                                                            </div>
                                                                            <p><?= $nts['nts_nota'] ?></p>
                                                                            <!-- <div class="d-flex flex-row align-items-center">
                                                                            <img class="me-1" src="<?= HTTP_HOST . 'app/' ?>app-assets/images/icons/file-icons/pdf.png" alt="invoice" height="23">
                                                                            <span>invoice.pdf</span>
                                                                        </div> -->
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="timeline">
                                                                <?php foreach ($data_evidencia as $key => $evd) : ?>
                                                                    <li class="timeline-item">
                                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                                        <div class="timeline-event">
                                                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                                <!-- <h6>12 Invoices have been paid</h6> -->
                                                                                <span class="timeline-event-time"><?= $evd['srve_fecha'] ?></span>
                                                                            </div>
                                                                            <p><?= $evd['srve_descripcion'] ?></p>
                                                                            <div class="d-flex flex-row align-items-center">
                                                                                <img class="me-1" src="<?= $evd['srve_ruta'] ?>" alt="invoice" width="100%">

                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    <div class="row">
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-striped table-inverse ">
                                                                <thead class="thead-inverse">
                                                                    <tr>
                                                                        <th>ATRIBUTO</th>
                                                                        <th>INFORMACIÓN</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td scope="row">Número de órden</td>
                                                                        <td><strong><?= $data_servicio['orden'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Cliente</td>
                                                                        <td><strong><?= $data_servicio['nombre'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Fecha recepción</td>
                                                                        <td><strong><?= $data_servicio['srv_fecha_recepcion'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Estado</td>
                                                                        <td><strong><?= MainControlador::getEstadoServicios($data_servicio['estado_equipo']) ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Tipo de equipo</td>
                                                                        <td><strong><?= $data_servicio['equipo'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Marca</td>
                                                                        <td><strong><?= $data_servicio['marca'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Modelo</td>
                                                                        <td><strong><?= $data_servicio['modelo'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Color</td>
                                                                        <td><strong><?= $data_servicio['color'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Estado fisico</td>
                                                                        <td><strong><?= $data_servicio['estado_fisico'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Problema</td>
                                                                        <td><strong><?= $data_servicio['problema'] ?></strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td scope="row">Solución</td>
                                                                        <td><strong><?= $data_servicio['solucion'] ?></strong></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- right profile info section -->
                                <div class="col-lg-2 col-12 order-3">

                                </div>
                                <!--/ right profile info section -->
                            </div>

                            <!-- reload button -->

                            <!--/ reload button -->
                        </section>
                        <!--/ profile info section -->
                    </div>

                </div>
            </div>
        </div>
        <!-- END: Content-->
    <?php else : ?>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CONOCE EL ESTADO DE TU REPARACIÓN</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">

                                    <input type="text" id="srv_codigo" class="form-control" placeholder="Ingresa tu código" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary waves-effect btnst" id="button-addon2" type="button">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            });
            $(".btnst").on("click", function() {
                // var urlApp = $(".urlApp").attr("urlApp")
               

                var srv_codigo = $("#srv_codigo").val();
                // alert(srv_codigo)

                document.location.href = '<?= HTTP_HOST ?>' + 'st/' + srv_codigo
            })
        </script>
    <?php endif; ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT © 2023
                <a class="ms-25" href="https://softmor.com/" target="_blank">SOFTMOR</a>
            </span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->



    <!-- BEGIN: Vendor JS-->
    <script src="<?= HTTP_HOST . 'app/' ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= HTTP_HOST . 'app/' ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= HTTP_HOST . 'app/' ?>app-assets/js/scripts/pages/page-profile.js"></script>

    <script src="<?= HTTP_HOST . 'app/' ?>app-assets/js/scripts/components/components-navs.min.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>