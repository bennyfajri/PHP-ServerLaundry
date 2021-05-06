<?php
include "dbconnect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$response = array();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
        $nama_user = $_POST['nama_user'];
	$nama_laundry = $_POST['nama_laundry'];

	//langkah 2
	$cek = "SELECT * FROM laundry WHERE Username = '$username'";
	$result = mysqli_fetch_array(mysqli_query($conn, $cek));

	if(isset($result)){
		$response['value'] = 2;
		$response['message'] = "Username telah digunakan";

		echo json_encode($response);
	} else {
		$insert = "INSERT INTO laundry VALUE(NULL, '$username','$password',
		'$nama_user','$nama_laundry')"; 

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