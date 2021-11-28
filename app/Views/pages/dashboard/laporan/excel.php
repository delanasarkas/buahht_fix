<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$title.xls");
	?>
 
    <h3><?= $title; ?></h3>
 
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
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($data as $presensi) : ?>
            <tr>
                <td align='center'><?= $no++; ?></td>
                <td><?= $presensi['nama']; ?></td>
                <td align='center'><?= $presensi['state']; ?></td>
                <td><?= date("d F Y", strtotime($presensi['date'])) ?></td>
                <td><?= date("h:i:s A", strtotime($presensi['date'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
	</table>
</body>
</html>