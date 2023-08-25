<html>

<head>
    <?= $this->include('template/head') ?>
</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?= $this->include('template/sidebar') ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?= $this->include('template/navbar') ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                </div>
            </div>
            <!-- End of Main Content -->

            <?= $this->renderSection('content') ?>

            <?= $this->include('template/footer') ?>

            <?= $this->include('template/scripts') ?>

</body>

</html>