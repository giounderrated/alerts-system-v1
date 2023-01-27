<?php 
/***************************************************************/
/* Program Assignment:  Delete  Messages                       */           
/* Developer            Carlos Castillo                        */                                              
/* Date:                21-03-2022                             */                                           
/* Description:         Erase message                          */                                             
/***************************************************************/

include("../../bd.php");
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$id = $data->id;

$query = "DELETE FROM messages where id = '$id'";

if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
    echo "message was not deleted";
}
else{
    echo "message was deleted successfully";
} 
?>