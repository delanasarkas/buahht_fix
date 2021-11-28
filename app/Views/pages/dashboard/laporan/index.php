<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    <style>
        @media print {
            table {
                border: solid #000 !important;
                width: 100% !important;
            }
            th, td {
                border: solid #000 !important;
                border-width: 0 1px 1px 0 !important;
            }
        }
    </style>

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
    <br/>

    <?php if(isset($_GET['nama_filter'])) { ?>
        <a target="_blank" href="/laporan/export-excel?nama_filter=<?= $_GET['nama_filter'] ?>">EXPORT EXCEL</a>
        <button type="button" onclick="printDiv('printableArea')">Cetak</button>
    <?php } ?>

    <?php if(isset($_GET['tgl_start'])) { ?>
        <a target="_blank" href="/laporan/export-excel?tgl_start=<?= $_GET['tgl_start'] ?>&tgl_end=<?= $_GET['tgl_end'] ?>">EXPORT EXCEL</a>
        <button type="button" onclick="printDiv('printableArea')">Cetak</button>
    <?php } ?>

    <?php if(isset($_GET['bln_start'])) { ?>
        <a target="_blank" href="/laporan/export-excel?bln_start=<?= $_GET['bln_start'] ?>&bln_end=<?= $_GET['bln_end'] ?>">EXPORT EXCEL</a>
        <button type="button" onclick="printDiv('printableArea')">Cetak</button>
    <?php } ?>
    <div id="printableArea">
        <h3>Table Presensi</h3>
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
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $presensi) : ?>
                <tr>
                    <td align='center'><?= $no++; ?></td>
                    <td><?= $presensi['nama']; ?></td>
                    <td align='center'><?= $presensi['state'] == 1 ? 'Valid' : 'Tidak Valid' ?></td>
                    <td><?= date("d F Y", strtotime($presensi['date'])) ?></td>
                    <td><?= date("h:i:s A", strtotime($presensi['date'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
<?= $this->endSection() ?>