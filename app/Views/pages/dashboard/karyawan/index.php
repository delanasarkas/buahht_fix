<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    
    <h1><?= $title ?></h1>

    <form action="/tarik-karyawan">
        <input type="submit" value="Tarik Data" />
    </form>
    <br/><br/>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Password</th>
            </tr>
        </thead>
            <?php $no = 1; ?>
            <?php foreach($data as $user) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $user['id_finger']; ?></td>
                <td><?= $user['nama']; ?></td>
                <td><?= $user['level']; ?></td>
                <td><?= $user['password']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>