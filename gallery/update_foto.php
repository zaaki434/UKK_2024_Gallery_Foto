<?php
session_start();
include "koneksi.php";

$foto_id = $_POST['foto_id'];
$judul_foto = $_POST['judul_foto'];
$deskripsi_foto = $_POST['deskripsi_foto'];
$album_id = $_POST['album_id'];

$query = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judul_foto', deskripsi_foto='$deskripsi_foto', album_id='$album_id' WHERE foto_id='$foto_id'");
echo "<script>alert('Data Berhasil Diubah'); window.location.assign('foto.php');</script>";


?>