<?php
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
    <title>Gallery -Album</title>
    <link rel="stylesheet" href="css/link.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <?php include "navbar.php"?>
    <Center><h1>Gallery -Album</h1></Center>


    <?php
    include "koneksi.php";

    $album_id = $_GET['album_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM album WHERE album_id='$album_id'");
    while($data = mysqli_fetch_array($query)){
        ?>



        <form action="update_album.php" method="post">
        <input type="text" name="album_id" value="<?=$data['album_id']?>" hidden readonly >
        <table>
            <tr>
                <td><label for="nama_album">Nama Album: </label></td>
                <td><input id="nama_album" type="text" name="nama_album" value="<?=$data['nama_album']?>" required ></td>
            </tr>
            <tr>
                <td><label for="deskripsi">Deskripsi Album: </label></td>
                <td><input type="text" name="deskripsi" required value="<?=$data['deskripsi']?>" ></td>
            </tr>
            <tr>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    

    <?php
    include "koneksi.php";
    $user_id = $_SESSION['user_id'];
    $query2 = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$user_id'");
    while($data=mysqli_fetch_array($query2)){
        ?>
        <tr>
            <td><?=$data['album_id']?></td>
            <td><?=$data['nama_album']?></td>
            <td><?=$data['deskripsi']?></td>
            <td><?=$data['tanggal_dibuat']?></td>

            <td class="k_tombol">
                <a class="tombol" id="hapus" href="hapus_album.php?album_id=<?=$data['album_id']?>">hapus</a>
                <a class="tombol" id="edit" href="edit_album.php?album_id=<?=$data['album_id']?>">edit</a>
            </td>
        </tr>
        <?php
    }
    ?>
    
</body>
</html>