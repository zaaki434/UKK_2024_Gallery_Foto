<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];

$query = mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password','$email','$nama_lengkap','$alamat')");
echo "<script>alert('Anda Berhasil Mendaftar, Silahkan Login!!'); window.location.assign('login.php');</script>";


?>