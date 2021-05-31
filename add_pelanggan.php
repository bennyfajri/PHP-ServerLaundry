<?php

include 'dbconnect.php';

$idUser = $_POST['idUser'];
$namaPelanggan = $_POST['namaPelanggan'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

if(!$idUser || !$namaPelanggan || !$nohp || !$alamat){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($conn, "INSERT INTO pelanggan VALUE('','$idUser','$namaPelanggan','$nohp','$alamat')");

  if($query){
    echo json_encode(array('message'=>'Customer data successfully added.'));
  }else{
    echo json_encode(array('message'=>'Customer data failed to add.'));
  }

}

?>