<?php
include "koneksi.php";
session_start();

$judul_foto = isset($_POST['judul_foto']) ? $_POST['judul_foto'] : '';
$deskripsi_foto = isset($_POST['deskripsi_foto']) ? $_POST['deskripsi_foto'] : '';
$album_id = isset($_POST['album_id']) ? $_POST['album_id'] : '';
$tanggal_unggah = date("Y-m-d");
$user_id = $_SESSION['user_id'];

$asal_foto = isset($_FILES['lokasifile']['tmp_name']) ? $_FILES['lokasifile']['tmp_name'] : '';
$nama_foto = isset($_FILES['lokasifile']['name']) ? $_FILES['lokasifile']['name'] : '';
$folder = "gambar";

if(move_uploaded_file($asal_foto, $folder.'/'.$nama_foto)) {
    mysqli_query($koneksi, "INSERT INTO foto VALUES(NULL,'$judul_foto','$deskripsi_foto','$tanggal_unggah','$nama_foto','$album_id','$user_id')");
    echo "<script>alert('Data Berhasil Di Tambah'); window.location.assign('foto.php');</script>";

} else {
    echo "File upload failed.";
}
?>
