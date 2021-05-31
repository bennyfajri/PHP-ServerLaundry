<?php
    require_once ('dbconnect.php');
    
    $id_pelanggan = $_POST['idPelanggan'];
    $id_user = $_POST['idUser'];
    $nama_pelanggan = $_POST['namaPelanggan'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    
    if(!$id_pelanggan ||!$id_user || !$nama_pelanggan || !$nohp || !$alamat){
        echo json_encode(array('message'=> 'data tidak boleh kosong'));
    }else{
        $sqlquery = mysqli_query($conn, "UPDATE pelanggan SET Nama_Pelanggan = '$nama_pelanggan',
        NoHP = '$nohp', alamat = '$alamat' where ID_Pelanggan = '$id_pelanggan' and ID_User = '$id_user'");
        
        if($sqlquery){
            echo json_encode(array('message'=> 'customer data successfully updated.'));
        }else{
            echo json_encode(array('message'=> 'student data failed to update.'));
        }
    }

?>
