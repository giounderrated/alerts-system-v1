<?php
session_start();
/***************************************************************
    Program Assignment:  Login
    Developer            Giovani Flores      
    Date:                28-03-2022 
    Description:         Login 
***************************************************************/
include "../../bd.php";

$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$email = $data[0]->value;
$password = $data[1]->value;

$query = "SELECT * FROM users where email ='$email' and password='$password'";


$response=array("status"=>"", "data"=>"");

$result = mysqli_query($connection, $query);

if (!$result) {
    exit(mysqli_error($connection));
    $response["status"]    	=   "401";
    $response            	=   json_encode($response);
    echo $response;
}
else{
    if($result->num_rows>0){
        $row = mysqli_fetch_row($result);
        $type  = $row[4];
		$id= $row[0];
		$ban= $row[9];
        $response["status"]    	=   "201";
		$response["ban"]   =   $ban;
        $response            	=   json_encode($response);

		$_SESSION["id_tutor"]   =   $id;
        $_SESSION["user"]       =   $email;
        $_SESSION["typeUser"]   =   $type;
        echo $response;
    }
    else{
        $response["status"]   	=   "203";
        $response            	=   json_encode($response);
        echo $response;
    }
    
} 
 ?>