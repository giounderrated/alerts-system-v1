<?php 
/***************************************************************/
/* Program Assignment:  Delete  Moderators                     */           
/* Developer            Fernanda Reyes                         */                                              
/* Date:                02-05-2022                             */                                           
/* Description:         Erase moderator                        */                                             
/***************************************************************/

include("../../bd.php");
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$id = $data->id;

$query = "DELETE FROM users where id = '$id'";

if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
    echo "NO PUDO SER ELIMINADO EL MODERADOR SELECCIONADO";
}
else{
    echo "SE HA ELIMINADO AL MODERADOR SELECCIONADO EXITOSAMENTE";
} 
?>