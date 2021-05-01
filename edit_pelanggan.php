<?php
    include_once 'dbconnect.php';
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    
    $sqlquery = "UPDATE pelanggan SET Nama_Pelanggan = '$nama_pelanggan',
        NoHP = '$nohp', alamat = '$alamat' where ID_Pelanggan = '$id_pelanggan'";
    if(mysqli_query($conn,$sqlquery)){
         echo 'Berhasil Edit User ';
    }
    else{
       echo 'silahkan coba lagi';
    }
    mysqli_close($conn);
?>
