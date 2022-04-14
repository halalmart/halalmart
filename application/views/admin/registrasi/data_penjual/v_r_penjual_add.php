<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>
	<center>
		<h1>Registrasi</h1>
		
       
	</center>
    <form action="<?php echo base_url(). 'penjual/r_penjual/add_action'; ?>" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" name="jenis_kelamin"></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td><input type="text" name="kota"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><input type="text" name="foto"></td>
                </tr>
                <tr>
                    <td>Registrasi</td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
</html>