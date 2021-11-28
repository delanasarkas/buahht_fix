<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    
    <h1><?= $title ?></h1>

    <form action="/tarik-presensi">
        <input type="submit" value="Tarik Data" />
    </form>
    <br/><br/>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Waktu</th>
            </tr>
        </thead>
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

<?= $this->endSection() ?>