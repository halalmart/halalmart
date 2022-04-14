<!DOCTYPE html>
<html>

<head>
	<title>Data penjual</title>
</head>

<body>
	<h1>Data penjual</h1>
	<a href="<?= base_url('penjual/R_penjual/add/') ?>">tambah</a>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Foto</th>
			<th>ID member</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;
		foreach ($penjual as $u) {
		?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $u->image ?></td>
				<td><?= $u->id_penjual ?></td>
				<td><?= $u->name ?></td>
				<td><?= $u->jenis_kelamin ?></td>
				<td><?= $u->address ?></td>
				<td><?= $u->city ?></td>
				<td>

					<a href="<?= base_url('penjual/R_penjual/edit/' . $u->id); ?>">edit</a>
					<a href="<?= base_url('penjual/R_penjual/delete/' . $u->id) ?>">delete</a>

				</td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>