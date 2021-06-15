<?php

include 'dbconnect.php';

$idUser = $_POST['idUser'];
$idProduk = $_POST['idProduk'];
$idPelanggan = $_POST['idPelanggan'];
$tglSelesai = $_POST['tglSelesai'];
$statusBayar = $_POST['statusBayar'];
$jumlahHarga = $_POST['jumlahHarga'];
$totalDibayar = $_POST['totalDibayar'];
$catatan = $_POST['catatan'];
$metodeBayar = $_POST['metodeBayar'];

if(!$idUser || !$idProduk || !$idPelanggan || !$tglSelesai
        || !$statusBayar || !$jumlahHarga || !$catatan || !$metodeBayar){
  echo json_encode(array('message'=>'required field is empty.'));
}else{

  $query = mysqli_query($conn, "INSERT INTO transaksi VALUE('null','$idPelanggan','$idProduk','$idUser',now(),'$tglSelesai', '$metodeBayar', '$jumlahHarga','$totalDibayar', '$catatan', '$statusBayar')");

  if($query){
    echo json_encode(array('message'=>'Product data successfully added.'));
  }else{
    echo json_encode(array('message'=>'Product data failed to added.'));
  }

}

?>
