<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Aksi</h6>
                    </li>

                    <li>
                        <form class="dropdown-item" action="/tarik-presensi">
                            <button type="submit" class="btn btn-warning btn-sm btn-block"><i class="bi bi-upload"></i> Tarik Data</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Table <?= $title ?></h5>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($data as $presensi) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $presensi['nama']; ?></td>
                            <td><?= $presensi['state'] == 1 ? 'Valid' : 'Tidak Valid' ?></td>
                            <td><?= $presensi['date']; ?></td>
                            <td><?= $presensi['date']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>