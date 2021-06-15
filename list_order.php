<?php

require_once('dbconnect.php');

$result = array();

$idUser = $_GET['idUser'];

$query = mysqli_query($conn,"SELECT 
t.ID_Transaksi,t.ID_Pelanggan, pl.Nama_Pelanggan, 
pl.Alamat, pl.NoHP, t.ID_Produk, pr.Nama_Produk,
t.Tgl_Masuk, t.Tgl_Selesai, t.Metode_Pembayaran,
t.Jumlah_Harga, t.Total_Dibayar, t.Catatan, t.status_pembayaran 
FROM 
transaksi t, pelanggan pl, produk pr 
WHERE 
t.ID_User = '$idUser' and t.ID_Pelanggan = pl.ID_Pelanggan 
and t.ID_Produk = pr.ID_Produk 
ORDER BY t.Tgl_Masuk desc");
while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>

