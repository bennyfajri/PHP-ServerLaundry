<?php
include "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$response = array();
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// langkah 2
	$cek = "SELECT * FROM laundry WHERE username='$username' and password='$password'";
	$result = mysqli_fetch_array(mysqli_query($conn, $cek)); 
        if (isset($result)) {
	$response['value'] = 1;
	$response['id_user'] = $result['ID_User'];
	$response['message'] = "Login berhasil";
        $response['username'] = $result['Username'];
	$response['nama_user'] = $result['Nama_User'];
	$response['nama_laundry'] = $result['Nama_Laundry'];
	echo json_encode($response);
} else {
	$response['value'] = 0;
	$response['message'] = "Login gagal"; echo json_encode($response);
	}
} 

?>