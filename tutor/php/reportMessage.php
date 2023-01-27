<?php 
/***************************************************************/
/* Program Assignment:  Report Message	                     */           
/* Developer            Fernanda Reyes                         */                                              
/* Date:                02-05-2022                             */                                           
/* Description:         function to report a message           */                                             
/***************************************************************/

include("../../bd.php");
$connection = conectar();

$data = json_decode( file_get_contents('php://input'));
$id = $data->id;

$query = "INSERT INTO reports (id_message) VALUES ('$id')";

if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
    echo "NO PUDO SER ENVIADO EL REPORTE";
}
else{
    echo "SE HA ENVIADO EL REPORTE EXITOSAMENTE";
} 
?>