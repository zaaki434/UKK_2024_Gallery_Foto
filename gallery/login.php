<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <center class="tengah">
        <h1 class="judul">Gallery - From Login</h2>
        <form class="login" action="proses_login.php" method="post">
            <table class="input">
                    <tr class="t_input"><td><label for="username">Username: </label></td></tr>
                    <tr class="t_input"><td><input type="text" name="username" id="username" required></td></tr>        
                    <tr class="t_input"><td><label for="password">Password: </label></td></tr>
                    <tr class="t_input"><td><input type="password" name="password" id="password" required></td></tr>
                    <tr><td><input class="button" type="submit" value="Login"></td></tr>
                    <tr><td><a href="register.php">Klik Untuk Daftar!!</a></td></tr>
            </table>
        </form>
    </center>
</body>
</html>