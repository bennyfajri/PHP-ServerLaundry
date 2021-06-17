<?php

require_once('dbconnect.php');

$idTrans = $_GET['idTrans'];
$idProduk = $_GET['idProduk'];
$idPelanggan = $_GET['idPelanggan'];

if(!$idTrans && !$idProduk && !$idPelanggan){
  echo json_encode(array('message'=>'required field is empty'));
}else{

  $query = mysqli_query($conn, "DELETE FROM transaksi WHERE ID_Transaksi='$idTrans' and ID_Produk = '$idProduk' and ID_Pelanggan = '$idPelanggan'");

  if($query){
    echo json_encode(array('message'=>'student data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'student data failed to delete.'));
  }

}
?>
