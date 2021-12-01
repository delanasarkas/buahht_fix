<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-12">
                <?php if(session()->get('success')){ ?>
                    <div class="alert alert-success">
                        <?= session()->get('success'); ?>
                    </div>
                <?php } ?>
            </div>
            <!-- Sales Card -->
            <div class="col-lg-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                <h5 class="card-title">Total Karyawan</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?= $jumlahKaryawan ?></h6>

                    </div>
                </div>
                </div>

            </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-lg-6">
            <div class="card info-card revenue-card">

                <div class="card-body">
                <h5 class="card-title">Absensi Hari Ini</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar2-check"></i>
                    </div>
                    <div class="ps-3">
                    <h6><?= $jumlahPresensi ?></h6>

                    </div>
                </div>
                </div>

            </div>
            </div><!-- End Revenue Card -->

        </div><!-- End Customers Card -->

    </div>
    </div>

<?= $this->endSection() ?>