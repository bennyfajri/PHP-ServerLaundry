<?php

 require_once ('dbconnect.php');
 
 $result = array();
 
 $id = $_GET['idUser'];
 
 $query = mysqli_query($conn, "SELECT * FROM produk where ID_User = '$id' ORDER BY Nama_Produk");
 while($row = mysqli_fetch_assoc($query)){
     $result[] = $row;
 }
 
 echo json_encode(array('result'=> $result));
 
 ?>
