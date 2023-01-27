
<?php 
/***************************************************************/
/* Program Assignment:  Register                               */           
/* Developer            Giovani Flores                         */                                              
/* Date:                28-03-2022                             */                                           
/* Description:         Register Professor                     */                                             
/***************************************************************/

include "../../bd.php";
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
//print_r($data);
$name="default";
//name = $data[0]->value;
$email = $data[0]->value;
$password = $data[1]->value;
$type = $data[2]->value;

$response=array("status"=>"", "data"=>"");

if(!validateIfEmailAlreadyExists($email)){
    $query = "INSERT INTO users (name,email,password,type) VALUES ('$name','$email','$password','$type')";

    if (!$result = mysqli_query($connection, $query)) {
        exit(mysqli_error($connection));
        $response["status"]    	=   "401";
        $response["data"]    	=   "El registro fallo";
        $response            	=   json_encode($response);
        echo $response;
    }
    else{
        $response["status"]    	=   "201";
        $response["data"]    	=   "Registrado Correctamente";
        $response            	=   json_encode($response);
        echo $response;
    }
}

else{
    $response["status"]    	=   "203";
    $response["data"]    	=   "Ya existe un usuario con ese correo";
    $response            	=   json_encode($response);
    echo $response;
}

function validateIfEmailAlreadyExists($email):bool{
    $connection = conectar();
    $query = "SELECT * FROM users where email ='$email'";
    $result = mysqli_query($connection, $query);
    $rows = $result->num_rows;
    return $rows>0;
}
?>