<?php

require_once('dbconnect.php');

$idProduk = $_POST['idProduk'];
$idUser = $_POST['idUser'];
$jenis = $_POST['jenis'];
$namaProduk = $_POST['namaProduk'];
$hargaProduk = $_POST['hargaProduk'];

if(!$idProduk || !$idUser || !$jenis || !$hargaProduk || !$hargaProduk){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($conn, "UPDATE produk SET Jenis='$jenis', Nama_Produk='$namaProduk', Harga_Produk='$hargaProduk' WHERE ID_Produk = '$idProduk' and ID_User = '$idUser'");

  if($query){
    echo json_encode(array('message'=>'student data successfully updated.'));
  }else{
    echo json_encode(array('message'=>'student data failed to update.'));
  }

}


?>
