<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Halaman Utama</title>
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">
</head>
<style>
    .like{
        background-color: green;
        font-size: 15px;
        color: white;
    }

    .comment{
        background-color: orangered;
        color: white;
    }
    a{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        margin-left:1px;
        padding: 5px;
        display: inline-block;
        text-decoration: none;
    }
    .href{
        width: 8%;
    }
</style>
<body>
<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        include "relog.php";
    }else{
        include "navbar.php";
    }
    ?>
                <!--Menampilkan Table Data Foto (Publik)-->

    <center><h2>Gallery - Halaman Utama</h2></center>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Upload</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM foto,user WHERE foto.user_id=user.user_id");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?=$data['foto_id']?></td>
                <td><?=$data['judul_foto']?></td>
                <td><?=$data['deskripsi_foto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['nama_lengkap']?></td>
                <td>
                    <?php
                    $foto_id = $data['foto_id'];
                    $query2 = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$foto_id'");
                    echo mysqli_num_rows($query2);
                    ?>
                </td>
                <td class="href">
                    <a class="like" href="like.php?foto_id=<?=$data['foto_id']?>">Like</a>
                    <a class="comment" href="komentar.php?foto_id=<?=$data['foto_id']?>">Komentar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>