<?php
    include_once 'dbconnect.php';
    $stmt = $conn->prepare("SELECT * FROM pelanggan");
    $stmt->execute();
    $stmt->bind_result($ID_Pelanggan, $Nama_Pelanggan,$NoHP, $Alamat);
    $pelanggan = array();
    while($stmt->fetch()){
        $temp = array();
        $temp['id_pelanggan'] = $ID_Pelanggan;
        $temp['nama_pelanggan'] = $Nama_Pelanggan;
        $temp['nobp'] = $NoHP;
        $temp['alamat'] = $Alamat;
        array_push($pelanggan, $temp);
    }
    echo json_encode($pelanggan);
?>

