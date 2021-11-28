<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | SISTEM ABSENSI RSIA BUAH HATI PAMULANG</title>
</head>
<body>
    <!-- FLASH MESSAGE -->
    <small style="color: green"><?= session()->get('success'); ?></small>

    <!-- HEADER -->
        <?= $this->include('template/header_template') ?>
    <!-- END HEADER -->

    <!-- SIDEBAR -->
        <?= $this->include('template/sidebar_template') ?>
    <!-- END SIDEBAR -->

    <!-- CONTENT -->
        <?= $this->renderSection('content') ?>
    <!-- END CONTENT -->

    <!-- FOOTER -->
        <?= $this->include('template/footer_template') ?>
    <!-- END FOOTER -->
</body>
</html>