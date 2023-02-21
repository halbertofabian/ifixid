<html lang="es-MX" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>IFIX ID | Encuentra el punto de reparación más cercano a ti en nuestra plataforma.</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="https://softmor.com/images/isotipo_png.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://softmor.com/images/isotipo_png.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://softmor.com/images/isotipo_png.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://softmor.com/images/isotipo_png.png">
    <link rel="manifest" href="<?= HTTP_HOST . 'public/' ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= HTTP_HOST . 'public/' ?>assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= HTTP_HOST . 'public/' ?>assets/js/config.js"></script>
    <script src="<?= HTTP_HOST . 'public/' ?>vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'public/' ?>vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'public/' ?>assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="<?= HTTP_HOST . 'public/' ?>assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="<?= HTTP_HOST . 'public/' ?>assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="<?= HTTP_HOST . 'public/' ?>assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="<?= HTTP_HOST ?>app/modulos/app/css/toastr.min.css" rel="stylesheet"></link>
   
    <script src="<?= HTTP_HOST . 'public/' ?>vendors/jquery/jquery.min.js"></script>
    
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>