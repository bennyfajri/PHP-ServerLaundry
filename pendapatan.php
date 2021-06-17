<?php

require_once('dbconnect.php');

$result = array();
$idUser = $_GET['idUser'];
$jenis = $_GET['jenis'];

if(!$idUser && !$jenis){
  echo json_encode(array('message'=>'required field is empty'));
}else{
    $query;
    if($jenis == 'Harian'){
        $query = mysqli_query($conn, "SELECT sum(Total_Dibayar) as Total from transaksi where dayofmonth(now()) = dayofmonth(Tgl_Masuk) and ID_User = '$idUser'");
    }elseif ($jenis == 'Mingguan') {
        $query = mysqli_query($conn, "SELECT sum(Total_Dibayar) as Total from transaksi where week(now()) = week(Tgl_Masuk) and ID_User = '$idUser'");
    }elseif($jenis == 'Bulanan'){
        $query = mysqli_query($conn, "SELECT sum(Total_Dibayar) as Total from transaksi where month(now()) = month(Tgl_Masuk) and ID_User = '$idUser'");
    }
    while($row =  mysqli_fetch_assoc($query)){
        $result[] = $row;
    }
    echo json_encode(array('result' => $result));
}
?>
