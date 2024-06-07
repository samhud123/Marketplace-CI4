<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= base_url(); ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url(); ?>img/logo.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <?= $this->include('sellers/template/sidebar'); ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <?= $this->include('sellers/template/navbar'); ?>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <p><?= $this->renderSection('content') ?></p>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url(); ?>/assets/js/app.min.js"></script>
    <script src="<?= base_url(); ?>/assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>