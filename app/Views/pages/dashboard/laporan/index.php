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

    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Filter</h5>
                <form action="/laporan-tanggal">
                    <label for="tgl_start">Tanggal</label>
                    <div class="d-flex justify-content-between">
                        <input type="date" id="tgl_start" name="tgl_start" class="form-control" required/> 
                        <p class="pt-3">S/D</p>
                        <input type="date" id="tgl_end" name="tgl_end" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-dark mt-2">Cari</button>
                    <?php if(isset($_GET['tgl_start']) && count($data) !== 0) { ?>
                        <a target="_blank" class="btn btn-success mt-2" href="/laporan/export-excel?tgl_start=<?= $_GET['tgl_start'] ?>&tgl_end=<?= $_GET['tgl_end'] ?>"><i class="bi bi-file-excel"></i> EXPORT EXCEL</a>
                        <button class="btn btn-info mt-2" type="button" onclick="printDiv('printableArea')"><i class="bi bi-printer"></i> Cetak</button>
                    <?php } ?> 
                </form>
                <hr/>
                <form action="/laporan-bulan">
                    <label for="bln_start">Bulan</label>
                    <div class="d-flex justify-content-between">
                        <select name="bln_start" class="form-control" id="bln_start" required>
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
                        <p class="pt-3">S/D</p>
                        <select name="bln_end" id="bln_end" class="form-control" required>
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
                    </div>
                    <button type="submit" class="btn btn-dark mt-2">Cari</button>
                    <?php if(isset($_GET['bln_start']) && count($data) !== 0) { ?>
                        <a target="_blank" class="btn btn-success mt-2" href="/laporan/export-excel?bln_start=<?= $_GET['bln_start'] ?>&bln_end=<?= $_GET['bln_end'] ?>"><i class="bi bi-file-excel"></i> EXPORT EXCEL</a>
                        <button class="btn btn-info mt-2" type="button" onclick="printDiv('printableArea')"><i class="bi bi-printer"></i> Cetak</button>
                    <?php } ?>
                </form>
                <hr/>
                <form action="/laporan-nama">
                    <label for="nama_filter">Berdasarkan Nama</label>
                    <select name="nama_filter" id="nama_filter" class="form-control" required>
                        <option value="">Pilih Nama Karyawan</option>
                        <?php foreach($karyawan as $dataKaryawan) : ?>
                            <option value="<?= $dataKaryawan['id_finger'] ?>"><?= $dataKaryawan['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-dark mt-2">Cari</button>
                    <?php if(isset($_GET['nama_filter']) && count($data) !== 0) { ?>
                        <a target="_blank" class="btn btn-success mt-2" href="/laporan/export-excel?nama_filter=<?= $_GET['nama_filter'] ?>"><i class="bi bi-file-excel"></i> EXPORT EXCEL</a>
                        <button class="btn btn-info mt-2" type="button" onclick="printDiv('printableArea')"><i class="bi bi-printer"></i> Cetak</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div id="printableArea">
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
            </div>
        </div>
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