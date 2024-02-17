<?php
session_start();
include "koneksi.php";

$foto_id = $_GET['foto_id'];
$hapus = mysqli_query($koneksi, "DELETE FROM foto WHERE foto_id='$foto_id'");
header("location:foto.php");
?>