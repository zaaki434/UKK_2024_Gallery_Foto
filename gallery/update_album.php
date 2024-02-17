<?php
session_start();
include "koneksi.php";

$album_id = $_POST['album_id'];
$nama_album = $_POST['nama_album'];
$deskripsi = $_POST['deskripsi'];

$update_album = mysqli_query($koneksi, "UPDATE album SET nama_album='$nama_album',deskripsi='$deskripsi' WHERE album_id='$album_id'");
echo "<script>alert('Data Berhasil Diubah'); window.location.assign('album.php');</script>";

?>