<?php

require_once('dbconnect.php');

$result = array();

$idUser = $_GET['idUser'];

$query = mysqli_query($conn,"SELECT * FROM produk where Jenis like '%kiloan%' and  ID_User = '$idUser' ORDER BY ID_Produk");
while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>

