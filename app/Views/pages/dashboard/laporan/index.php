<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    <!-- VALIDATION PLUGIN -->
    <?php $validation = \Config\Services::validation(); ?>

    <h1><?= $title ?></h1>

    <h3>Filter</h3>
    <form action="/laporan-tanggal">
        <label for="tgl_start">Tanggal</label>
        <input type="date" id="tgl_start" name="tgl_start" required/> s/d <input type="date" id="tgl_end" name="tgl_end" required/>
        <button type="submit">Cari</button>
    </form>
    <br/>
    <form action="/laporan-bulan">
        <label for="bln_start">Bulan</label>
        <select name="bln_start" id="bln_start" required>
            <option value="">Pilih Awal Bulan</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select> 
        s/d 
        <select name="bln_end" id="bln_end" required>
            <option value="">Pilih Akhir Bulan</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select> 
        <button type="submit">Cari</button>
    </form>

    <br/>

    <form action="/laporan-nama">
        <label for="nama_filter">Berdasarkan Nama</label>
        <select name="nama_filter" id="nama_filter" required>
            <option value="">Pilih Nama Karyawan</option>
            <?php foreach($karyawan as $dataKaryawan) : ?>
                <option value="<?= $dataKaryawan['id_finger'] ?>"><?= $dataKaryawan['nama'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Cari</button>
    </form>

    <br/><br/>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>State</th>
                <th>Tanggal</th>
                <th>Waktu</th>
            </tr>
        </thead>
            <?php $no = 1; ?>
            <?php foreach($data as $presensi) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $presensi['nama']; ?></td>
                <td><?= $presensi['state']; ?></td>
                <td><?= date("d F Y", strtotime($presensi['date'])) ?></td>
                <td><?= date("h:i:s", strtotime($presensi['date'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>