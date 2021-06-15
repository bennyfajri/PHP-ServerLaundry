<?php

require_once('dbconnect.php');

$result = array();

$idUser = $_GET['idUser'];

$query = mysqli_query($conn,"SELECT * FROM pelanggan where ID_User = '$idUser' ORDER BY Nama_Pelanggan");
while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>

