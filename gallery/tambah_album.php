<?php
session_start();
include "koneksi.php";

$nama_album = $_POST['nama_album'];
$deskripsi = $_POST['deskripsi'];
$tanggal_dibuat = date("Y-m-d");
$user_id = $_SESSION['user_id'];

$tambah = mysqli_query($koneksi, "INSERT INTO album VALUES('','$nama_album','$deskripsi','$tanggal_dibuat','$user_id')");
header("location:album.php");
?>