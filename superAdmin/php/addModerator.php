<?php 
/***************************************************************/
/* Program Assignment:  Create Moderator                       */           
/* Developer            Fernanda Reyes                         */                                              
/* Date:                30-04-2022                             */                                           
/* Description:         Add a moderator to the database        */                                             
/***************************************************************/

include("../../bd.php");
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$email      =   $data[0]->value;
$password   =   $data[1]->value;
$name       =   $data[2]->value;
$type       =   "Moderator";

$query = "INSERT INTO users (email,password,name,type) VALUES ('$email','$password','$name','$type')";

if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
    echo "MODERATOR CREATION FAILED";
}
else{
    echo "MODERATOR CREATED";
} 
?>