<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include_once("dbconnect.php");
    $postdata = file_get_contents("php://input");

    if (isset($postdata)) {
        $request1 = json_decode($postdata);
        $username = $request1->username;
        $namaLaundry = $request1->namaLaundry;
        $alamat = $request1->alamat;
        $password = $request1->password;
         if($username == '' || $namaLaundry == '' || $alamat == '' || $password == ''){
                echo json_encode(array( "status" => "false","message" => "Parameter missing!") );
         }else{
                $query= "SELECT * FROM laundry WHERE username='$username'";
                $result= mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){  
                   echo json_encode(array( "status" => "false","message" => "Username already exist!") );
                }else{ 
                 $query = "INSERT INTO laundry (Username,Password,Alamat,Nama_Laundry) VALUES ('$username','$password','$alamat','$namaLaundry')";
                 if(mysqli_query($conn,$query)){
                     $query= "SELECT * FROM laundry WHERE username='$username'";
                             $result= mysqli_query($conn, $query);
                         $emparray = array();
                             if(mysqli_num_rows($result) > 0){  
                             while ($row = mysqli_fetch_assoc($result)) {
                                         $emparray[] = $row;
                                         echo json_encode(array( "status" => "true","message" => "Successfully registered!" , "data" => $row) );
                                       }
                             }
                 }else{
                     echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
                }
            }
                    mysqli_close($conn);
         }
    }

} else{
    echo json_encode(array( "status" => "false","message" => "Error occured, please try again!") );
}

 ?>