<?php

require_once('dbconnect.php');

$idProduk = $_GET['idProduk'];
$idUser = $_GET['idUser'];

if(!$idProduk || !$idUser){
  echo json_encode(array('message'=>'required field is empty'));
}else{

  $query = mysqli_query($conn, "DELETE FROM produk WHERE ID_Produk='$idProduk' and ID_User = '$idUser'");

  if($query){
    echo json_encode(array('message'=>'student data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'student data failed to delete.'));
  }

}


?>
