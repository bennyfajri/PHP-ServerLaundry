<?php
    include_once 'dbconnect.php';
    $id_pelanggan = $_POST['id_pelanggan'];
    
    $sqlquery = "DELETE FROM pelanggan WHERE ID_Pelanggan = '$id_pelanggan'";
    if(mysqli_query($conn,$sqlquery)){
         echo 'Delete data berhasil';
    }
    else{
       echo 'silahkan coba lagi';
    }
    mysqli_close($conn);
?>

