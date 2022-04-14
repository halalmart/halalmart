%<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
	<center>
		<h1>Registrasi</h1>
		
       
	</center>
	<?php foreach($pembeli as $u): ?>
	<form action="<?= base_url('pembeli/r_pembeli/edit_action/'.$u->id); ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?=$u->id ?>">
					<input type="text" name="nama" value="<?=$u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?=$u->username?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?=$u->password?>"></td>
			</tr>
            <tr>
				<td>Jenis Kelamin</td>
				<td><input type="text" name="jenis_kelamin" value="<?=$u->jenis_kelamin?>"></td>
			</tr>
            <tr>
				<td>Kota</td>
				<td><input type="text" name="kota" value="<?=$u->kota?>"></td>
			</tr>
            <tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?=$u->alamat?>"></td>
			</tr>
            <tr>
				<td>Foto</td>
				<td><input type="text" name="foto" value="<?=$u->foto?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php endforeach; ?>
</html>