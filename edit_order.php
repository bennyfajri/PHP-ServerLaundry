<?php
    require_once ('dbconnect.php');
    
    $idTrans = $_POST['idTrans'];
    $idUser = $_POST['idUser'];
    $totalBayar = $_POST['totalBayar'];
    $statusBayar = $_POST['statusBayar'];
    
    if(!$idTrans || !$idUser ||!$totalBayar || !$statusBayar){
        echo json_encode(array('message'=> 'data tidak boleh kosong'));
    }else{
        $sqlquery = mysqli_query($conn, "UPDATE transaksi SET Total_Dibayar = '$totalBayar', status_pembayaran = '$statusBayar' where ID_Transaksi = '$idTrans' and ID_User = '$idUser'");
        
        if($sqlquery){
            echo json_encode(array('message'=> 'Order data successfully updated.'));
        }else{
            echo json_encode(array('message'=> 'Order data failed to update.'));
        }
    }

?>
