<?php
/***************************************************************
 Program Assignment:  Create Message                                   
 Developer            Ernesto                                                                       
 Date:                21-03-2022                                                                        
 Description:         Create message to be sent to Tutor email entry.                                                  
/***************************************************************/
include "../../bd.php";
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$id_user = $data->id;
$type = $data->type;
$description = $data->description;

$query = "INSERT INTO messages (type,content,id_user) VALUES('$type', '$description', '$id_user')";

if (!$result = mysqli_query($connection, $query)) {
  exit(mysqli_error($connection));
  echo $connection->error;
}
else{
  echo "Alumno reportado exitosamente.";
} 


?>