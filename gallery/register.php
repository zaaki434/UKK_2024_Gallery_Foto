<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Daftar</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <center class="tengah">
        <h2 class="judul">Gallery - From Pendaftaran</h2>
        <form class="login" action="proses_register.php" method="post">
            <table class="input">
                <tr><td><label for="username">Username: </label></td></tr>
                <tr><td><input type="text" name="username" id="username" required></td></tr>

                <tr class="t_input"><td><label for="password">Password: </label></td></tr>
                <tr class="t_input"><td><input type="password" name="password" id="password" required></td></tr>
                <tr class="t_input"><td><label for="email">Email</label></td></tr>
                <tr class="t_input"><td><input type="email" name="email" id="email" required></td></tr>
                <tr class="t_input"><td><label for="nama_lengkap">Nama Lengkap: </label></td></tr>
                <tr class="t_input"><td><input type="text" name="nama_lengkap" id="nama_lengkap" required></td></tr>
                <tr class="t_input"><td><label for="alamat">Alamat: </label></td></tr>
                <tr class="t_input"><td><input type="text" name="alamat" id="alamat" required></td></tr>
                <tr><td><input type="submit" value="Daftar"></td></tr>
                <tr><td><a href="login.php">Sudah Terdaftar? Login!!</a></td></tr>
            </table>
        </form>
    </center>
</body>
</html>