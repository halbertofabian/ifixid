<body>
    <div class="urlApp" urlApp="<?= HTTP_HOST ?>"></div>
    <div class="urlAPI" urlAPI="<?= URL_API ?>"></div>
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