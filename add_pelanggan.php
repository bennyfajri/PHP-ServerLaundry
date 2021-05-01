<?php
include "dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$response = array();
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$nohp = $_POST['nohp'];
	$alamat = $_POST['alamat'];
	//langkah 2
        
	$cek = "SELECT * FROM pelanggan WHERE Nama_Pelanggan = '$nama_pelanggan'";
	$result = mysqli_fetch_array(mysqli_query($conn, $cek));

	if(isset($result)){
		$response['value'] = 2;
		$response['message'] = "Username telah digunakan";

		echo json_encode($response);
	} else {
		$insert = "INSERT INTO pelanggan VALUE('null',"
                        . "'$nama_pelanggan','$nohp','$alamat')"; 

		if(mysqli_query($conn, $insert)){
			$response['value'] = 1;
			$response['message'] = "Berhasil didaftarkan";
			echo json_encode(($response));
		}else{
			$response['value'] = 0; 
			$response['message'] = "Gagal didaftarkan";
			echo json_encode($response);
		}
	}
}