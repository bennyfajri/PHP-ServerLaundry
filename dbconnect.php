<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','laclaundry');
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL Server : " . mysqli_connect_error();
        die();
    }
?>
