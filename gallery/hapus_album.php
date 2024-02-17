<?php
include "koneksi.php";
session_start();

$album_id = $_GET['album_id'];
$hapus = mysqli_query($koneksi, "DELETE FROM album WHERE album_id='$album_id'");
header("location:album.php");
?>