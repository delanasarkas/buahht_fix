<!DOCTYPE html>
<html lang="en">
<head>
    <!-- BY NICEADMIN -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/logo/logo.png">
    <title>DASHBOARD | SISTEM ABSENSI RSIA BUAH HATI PAMULANG</title>

    <!-- STYLING -->
        <?= $this->include('template/styling') ?>
    <!-- END STYLING -->
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
        <main id="main" class="main">
            <div class="pagetitle">
            <h1><?= $title ?></h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
        <div class="row">
            <?= $this->renderSection('content') ?>
        </div>
        </section>

        </main><!-- End #main -->
    <!-- END CONTENT -->

    <!-- FOOTER -->
        <?= $this->include('template/footer_template') ?>
    <!-- END FOOTER -->

    <!-- SCRIPTING -->
        <?= $this->include('template/scripting') ?>
    <!-- END SCRIPTING -->
</body>
</html>