<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    
    <h1><?= $title ?></h1>
    <p>Total Karyawan: <?= $jumlahKaryawan ?></p>
    <p>Absensi Hari Ini: <?= $jumlahPresensi ?></p>

<?= $this->endSection() ?>