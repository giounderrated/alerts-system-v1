<?php
/***************************************************************/
/* Program Assignment:  DELETE Students                 */           
/* Developer            Ernesto Rojano Sanchez           */                                              
/* Date:                4/18/2022                           */                                           
/* Description:         delete Students from the database   */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();

$data=json_decode(file_get_contents('php://input'));
$query ="DELETE FROM users WHERE id=$data";
if (!$result = mysqli_query($connection, $query)) {
    //exit(mysqli_error($connection));
    echo "error en la eliminación del registro $data";
	die();
}
else{
	echo "registro $data eliminado con exito!";
	die();
} 
?>