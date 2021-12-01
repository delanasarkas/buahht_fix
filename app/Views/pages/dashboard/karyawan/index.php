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
                        <form class="dropdown-item" action="/tarik-karyawan">
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
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($data as $user) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['id_finger']; ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['level'] == 0 ? 'User' : '-' ?></td>
                            <td><?= $user['password'] == '' ? '-' : $user['password'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>