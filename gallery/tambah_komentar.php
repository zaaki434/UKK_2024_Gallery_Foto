<?php
    include "koneksi.php";
    session_start();

    $foto_id=$_POST['foto_id'];
    $isi_komentar=$_POST['isi_komentar'];
    $tanggal_komentar=date("Y-m-d");
    $user_id=$_SESSION['user_id'];

    $sql=mysqli_query($koneksi,"INSERT INTO komentar_foto VALUES('','$foto_id','$user_id','$isi_komentar','$tanggal_komentar')");

    header("location:komentar.php?foto_id=".$foto_id);
?>