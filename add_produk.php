<?php

include 'dbconnect.php';

$idUser = $_POST['idUser'];
$jenis = $_POST['jenis'];
$namaProduk = $_POST['namaProduk'];
$hargaProduk = $_POST['hargaProduk'];

if(!$idUser || !$jenis || !$namaProduk || !$hargaProduk){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($conn, "INSERT INTO produk VALUE('null','$idUser','$jenis','$namaProduk','$hargaProduk')");

  if($query){
    echo json_encode(array('message'=>'Product data successfully added.'));
  }else{
    echo json_encode(array('message'=>'Product data failed to added.'));
  }

}

?>