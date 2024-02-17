<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
    exit();
}

include "koneksi.php";
$foto_id=$_GET['foto_id'];
$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE foto_id='$foto_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery -Komentar</title>
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<style>
    .back{
        text-decoration: none;
        color: black;

    }
</style>
<body>
    <?php include"navbar.php"?>
    <center><h2>Halaman Komentar</h2></center>

    <form action="tambah_komentar.php" method="post">
        <?php
        while($data=mysqli_fetch_array($query)){
            ?>
            <input type="text" name="foto_id" value="<?=$data['foto_id']?>" hidden>
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul_foto" value="<?=$data['judul_foto']?>" readonly></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi_foto" value="<?=$data['deskripsi_foto']?>" readonly></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?=$data['lokasifile']?>" width="200px" ></td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td><input type="text" name="isi_komentar" required></td>
                </tr>
                <tr>
                    <td><a class="back" href="index.php"><==Kembali</a></td>
                    <td><input type="submit" value="Tambah"></td>

                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </form>


    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $user_id=$_SESSION['user_id'];
        $foto_id = $_GET['foto_id'];
        $komentar = mysqli_query($koneksi, "SELECT * FROM komentar_foto, user WHERE komentar_foto.user_id=user.user_id ");
        while($data=mysqli_fetch_array($komentar)){
            ?>
            <tr>
                <th><?=$data['komentar_id']?></th>
                <th><?=$data['nama_lengkap']?></th>
                <th><?=$data['isi_komentar']?></th>
                <th><?=$data['tanggal_komentar']?></th>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
