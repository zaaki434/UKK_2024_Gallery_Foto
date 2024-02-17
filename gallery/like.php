<?php

include "koneksi.php";
session_start();

if(!isset($_SESSION['user_id'])) {
    header("location:index.php");
}else{
    $foto_id = $_GET['foto_id'];
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($koneksi, "SELECT * FROM like_foto WHERE foto_id='$foto_id' AND user_id='$user_id'");

    if (mysqli_num_rows($query)==1){
        header("location:index.php");
    }else{
        $tanggal_like=date("Y-m-d");
        mysqli_query($koneksi, "INSERT INTO like_foto VALUES ('','$foto_id','$user_id','$tanggal_like')");
        header("location:index.php");
    }
}