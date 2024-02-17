<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Anda Belum Login'); window.location.assign('login.php');</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery -Foto</title>
    <link rel="stylesheet" href="css/link.css">
    <link rel="shortcut icon" href="css/icon.ico" type="image/x-icon">

</head>
<body>
    <?php include "navbar.php"?>
    <center><h2>Gallery - Foto</h2></center>

                <!--Membuat Form Untuk Menambahkan Foto-->
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="judul_foto">Judul Foto: </label></td>
                <td><input type="text" name="judul_foto" id="judul_foto" required></td>
            </tr>
            <tr>
                <td><label for="deskripsi_foto">deskripsi Foto: </label></td>
                <td><input type="text" name="deskripsi_foto" id="deskripsi_foto" required></td>
            </tr>
            <tr>
                <td><label for="lokasifile">File Foto: </label></td>
                <td><input type="file" name="lokasifile" id="lokasifile" accept="image/png" required></td>
            </tr>
            <tr>
                <td><label for="album_id">Album: </label></td>
                <td>
                    <select name="album_id" id="album_id" required><
                        <?php
                        include "koneksi.php";
                        $user_id = $_SESSION['user_id'];
                        $album = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$user_id'");
                        while($data=mysqli_fetch_array($album)){
                            ?>
                            <option value="<?=$data['album_id']?>"><?=$data['nama_album']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0 width=100%>
        <tr> 
            <!--Membuat Judul Tabel Data-->
            <th>ID</th>
            <th>Judul Foto</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Foto</th>
            <th>Album</th>
            <th>disukai</th>
            <th>aksi</th>
        </tr>

        <?php
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($koneksi, "SELECT * FROM foto,album WHERE foto.user_id='$user_id' AND foto.album_id=album.album_id");
        while($data=mysqli_fetch_array($query)){
            ?>
            <!--Menampilkan Isi Tabel Data Foto (Milik User)-->
            <tr>
                <td><center><?=$data['foto_id']?></td>
                <td><center><?=$data['judul_foto']?></td>
                <td><center><?=$data['deskripsi_foto']?></td>
                <td><center><?=$data['tanggal_unggah']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px" >
                </td>
                <td><center><?=$data['nama_album']?></td>
                <td>
                    <?php
                    $foto_id = $data['foto_id'];
                    $query2 = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$foto_id'");
                    echo mysqli_num_rows($query2);
                    ?>
                </td>
                <td class="k_tombol">
                <!--Tombol Aksi Edit & Hapus-->

                    <a class="tombol" id="hapus" href="hapus_foto.php?foto_id=<?=$data['foto_id']?>">Hapus</a>
                    <a class="tombol" id="edit" href="edit_foto.php?foto_id=<?=$data['foto_id']?>">Edit</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>