%
<!DOCTYPE html>
<html>

<head>
    <title>Registrasi</title>
</head>

<body>
    <center>
        <h1>Registrasi</h1>


    </center>
    <?php foreach ($penjual as $u) : ?>
        <form action="<?= base_url('pembeli/r_pembeli/edit_action/' . $u->id); ?>" method="post">
            <table style="margin:20px auto;">
                <tr>
                    <td>email</td>
                    <td>
                        <input type="hidden" name="id" value="<?= $u->id ?>">
                        <input type="text" name="email" value="<?= $u->email ?>">
                    </td>
                </tr>
                <tr>
                    <td>name</td>
                    <td><input type="text" name="username" value="<?= $u->username ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" value="<?= $u->password ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="text" name="jenis_kelamin" value="<?= $u->jenis_kelamin ?>"></td>
                </tr>
                <tr>
                    <td>city</td>
                    <td><input type="text" name="city" value="<?= $u->city ?>"></td>
                </tr>
                <tr>
                    <td>address</td>
                    <td><input type="text" name="address" value="<?= $u->address ?>"></td>
                </tr>
                <tr>
                    <td>image</td>
                    <td><input type="text" name="image" value="<?= $u->image ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    <?php endforeach; ?>

</html>