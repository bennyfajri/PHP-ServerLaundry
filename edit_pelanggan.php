<?php
    require_once ('dbconnect.php');
    
    $idPelanggan = $_POST['idPelanggan'];
    $idUser = $_POST['idUser'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    
    if(!$idPelanggan || !$idUser ||!$namaPelanggan || !$nohp || !$alamat){
        echo json_encode(array('message'=> 'data tidak boleh kosong'));
    }else{
        $sqlquery = mysqli_query($conn, "UPDATE pelanggan SET Nama_Pelanggan = '$namaPelanggan', NoHP = '$nohp', Alamat = '$alamat' where ID_Pelanggan = '$idPelanggan' and ID_User = '$idUser'");
        
        if($sqlquery){
            echo json_encode(array('message'=> 'customer data successfully updated.'));
        }else{
            echo json_encode(array('message'=> 'student data failed to update.'));
        }
    }

?>
