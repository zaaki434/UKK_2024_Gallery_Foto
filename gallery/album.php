<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Album</title>
    <link rel="stylesheet" href="css/link.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <?php include "navbar.php"?>
    <center><h2>Gallery - Album</h2></center>
                <!--Membuat Form Tambah Album-->

    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td><label for="nama_album">Nama Album: </label></td>
                <td><input type="text" name="nama_album" id="nama_album" required></td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi Album: </label></td>
                <td><input type="text" name="deskripsi" id="deskripsi" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

                <!--Menampilkan Table Data Album-->

    <table border="1" cellpadding=5 cellspacing=0 width=100%>
        <tr>
            <th>ID</th>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    <?php
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$user_id'");
    while($data=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><center><?=$data['album_id']?></td>
            <td><center><?=$data['nama_album']?></td>
            <td><center><?=$data['deskripsi']?></td>
            <td><center><?=$data['tanggal_dibuat']?></td>
            <td class="k_tombol">
                <a class="tombol" id="edit" href="edit_album.php?album_id=<?=$data['album_id']?>">Edit</a>
                <a class="tombol" id="hapus" href="hapus_album.php?album_id=<?=$data['album_id']?>">Hapus</a>
            </td>
            
        </tr>
        <?php
    }
    ?>
    </table>

</body>
</html>