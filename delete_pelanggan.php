<?php

require_once('dbconnect.php');

$idPel = $_GET['idPelanggan'];
$idUs = $_GET['idUser'];

if(!$idPel && !$idUs){
  echo json_encode(array('message'=>'required field is empty'));
}else{

  $query = mysqli_query($conn, "DELETE FROM pelanggan WHERE ID_Pelanggan='$idPel' and ID_User = '$idUs'");

  if($query){
    echo json_encode(array('message'=>'student data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'student data failed to delete.'));
  }

}
?>
