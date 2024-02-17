<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}

include "koneksi.php";
$foto_id = $_GET['foto_id'];
$foto = mysqli_query($koneksi, "SELECT * FROM foto WHERE foto_id='$foto_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery -EditFoto</title>
    <link rel="stylesheet" href="css/link.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <?php include "navbar.php"?>
    <Center><h2>Gallery -Edit Foto</h2></Center>

    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
        while ($data=mysqli_fetch_array($foto)){
            ?>
            <td><input type="text" name="foto_id" value="<?=$data['foto_id']?>" hidden readonly></td>
        <table>
            <tr>
                <td><label for="judul_foto">judul Foto: </label></td>
                <td><input type="text" name="judul_foto" value="<?=$data['judul_foto']?>" required ></td>
            </tr>
            <tr>
                <td><label for="deskripsi_foto">Deskripsi Foto: </label></td>
                <td><input type="text" name="deskripsi_foto" value="<?=$data['deskripsi_foto']?>" required ></td>
            </tr>
            <tr>
            <td><label for="album_id">Nama Album</label></td>
                <td>

                    <select name="album_id" id="album_id">
                    <?php
                    include "koneksi.php";
                    $user_id = $_SESSION['user_id'];
                    $album = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$user_id'");
                    while ($data=mysqli_fetch_array($album)){
                        ?>
                        <option value="<?=$data['album_id']?>"><?=$data['nama_album']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><a style="text-decoration: none;  " href="foto.php"><==Cancel</a></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
    }
    ?>
    </form>

    
    
</body>
</html>