<?php
    require_once 'dbconnect.php';
    
     //an array to display response
    $response = array();
    
    if(isset($_GET['apicall'])){
        switch ($_GET['apicall']){
            case 'signup':
                //checking the parameters required are available or not 
                if(isTheseParametersAvailable(array('username','password','nama_user','nama_laundry'))){
 
                //getting the values 
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $nama_user = $_POST['nama_user']; 
                $nama_laundry = $_POST['nama_laundry']; 

                //checking if the user is already exist with this username or email
                //as the email and username should be unique for every user 
                $stmt = $conn->prepare("SELECT ID_User FROM laundry WHERE Username = ? OR Nama_User = ?");
                $stmt->bind_param("ss",$username, $nama_user);
                $stmt->execute();
                $stmt->store_result();

                //if the user already exist in the database 
                if($stmt->num_rows > 0){
                $response['error'] = true;
                $response['message'] = 'User already registered';
                $stmt->close();
                }else{

                //if user is new creating an insert query 
                $stmt = $conn->prepare("INSERT INTO laundry (Username, Password, Nama_User, Nama_Laundry) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss",$username, $password, $nama_user, $nama_laundry);

                //if the user is successfully added to the database 
                if($stmt->execute()){

                //fetching the user back 
                $stmt = $conn->prepare("SELECT ID_User, Username, Nama_User, Nama_Laundry FROM laundry WHERE username = ?"); 
                $stmt->bind_param("s",$username);
                $stmt->execute();
                $stmt->bind_result($id, $username, $nama_user, $nama_laundry);
                $stmt->fetch();

                $laundry = array(
                'id_user'=>$id, 
                'Username'=>$username, 
                'Nama_User'=>$nama_user,
                'Nama_Laundry'=>$nama_laundry
                );

                $stmt->close();

                //adding the user data in response 
                $response['error'] = false; 
                $response['message'] = 'User registered successfully'; 
                $response['laundry'] = $laundry; 
                }
                }

                }else{
                    $response['error'] = true; 
                    $response['message'] = 'required parameters are not available'; 
                }
                
                break;
            
            case 'login':
                if(isTheseParametersAvailable(array('username', 'password'))){
                    //getting values 
                    $username = $_POST['username'];
                    $password = md5($_POST['password']); 

                    //creating the query 
                    $stmt = $conn->prepare("SELECT ID_User, Username, Nama_User, Nama_Laundry FROM laundry WHERE Username = ? AND Password = ?");
                    $stmt->bind_param("ss",$username, $password);

                    $stmt->execute();

                    $stmt->store_result();

                    //if the user exist with given credentials 
                    if($stmt->num_rows > 0){

                    $stmt->bind_result($id, $username, $nama_user, $nama_laundry);
                    $stmt->fetch();

                    $user = array(
                    'id_user'=>$id, 
                    'username'=>$username, 
                    'nama_user'=>$nama_user,
                    'nama_laundry'=>$nama_laundry
                    );

                    $response['error'] = false; 
                    $response['message'] = 'Login successfull'; 
                    $response['user'] = $user; 
                    }else{
                    //if the user not found 
                    $response['error'] = false; 
                    $response['message'] = 'Invalid username or password';
                    }
                }
                
                break;
            
            default;
            $response['error'] = true;
            $response['message'] = 'Invalid Operation Called';
        }
    }else{
        $response['error'] = true;
        $response['message'] = 'Invalid API Call';
    }
    
    echo json_encode($response);
     //function validating all the paramters are available
    //we will pass the required parameters to this function 
    function isTheseParametersAvailable($params){

        //traversing through all the parameters 
        foreach($params as $param){
            //if the paramter is not available
            if(!isset($_POST[$param])){
                //return false 
                return false; 
            }
        }
        //return true if every param is available 
        return true; 
    }
    
?>

