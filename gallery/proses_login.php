<?php
include "koneksi.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek==1){
    while($data=mysqli_fetch_array($query)){
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    }
    header("location:index.php");

}else{
    echo "<script>alert('Login Gagal Periksa Username Dan Kata Sandi'); window.location.assign('login.php');</script>";
}