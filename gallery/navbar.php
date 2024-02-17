<!DOCTYPE html>
<link rel="stylesheet" href="css/navbar.css">
<html>
<head>
</head>
<body>

<div class="navbar">
  <a href="index.php"><img src="css/icon.ico" width="30px" height="30px"> Halaman Utama</a>
  <a href="album.php">Album</a>
  <a href="foto.php">Foto</a>
  <a href="logout.php">Logout</a>
  <h2 class="text2"><?=$_SESSION['nama_lengkap']?></h2>
</div>
</body>
</html>
