<body>
    <div class="urlApp" urlApp="<?= HTTP_HOST ?>"></div>
    <div class="urlAPI" urlAPI="<?= URL_API ?>"></div>
    <div class="urlIfixid" urlIfixid="<?= isset(explode('/', $_GET['store'])[3]) ? URL_SOFTMOR_V7 : URL_SOFTMOR ?>"></div>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <?php


            // cargarComponenteLocal('app', 'sidebar-ifixid');



            ?>
            <div class="content">
                <?php cargarComponenteLocal('app', 'topbar') ?>
                <?php cargarComponenteLocal('app', 'footer') ?>
                <?php cargarComponenteLocal('app', 'content') ?>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <?php //cargarComponenteLocal('app', 'settings')
    ?>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <?php cargarComponenteLocal('app', 'scripts') ?>
</body>