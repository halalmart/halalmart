<!DOCTYPE html>
<html>
<head>
	<title>Data Pembeli</title>
</head>
<body>
<h1>Data Pembeli</h1>
	<a href="<?= base_url('pembeli/R_pembeli/add/') ?>">tambah</a>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
            <th>Foto</th>
			<th>Nama</th>
            <th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Kota</th>            
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($pembeli as $u){ 
		?>
		<tr>
			<td><?= $no++ ?></td>
            <td><?= $u->foto ?></td>
			<td><?= $u->nama ?></td>
            <td><?= $u->jenis_kelamin ?></td>
			<td><?=$u->alamat ?></td>
			<td><?=$u->kota?></td>
			<td>
			
			<a href="<?= base_url('pembeli/R_pembeli/edit/'.$u->id); ?>">edit</a>
			<a href="<?= base_url('pembeli/R_pembeli/delete/'.$u->id) ?>">delete</a>
	
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>