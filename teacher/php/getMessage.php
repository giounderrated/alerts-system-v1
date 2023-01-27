<?php
/***************************************************************/
/* Program Assignment:  Get Students                           */           
/* Developer            Giovani Flores                         */                                              
/* Date:                21-03-2022                             */                                           
/* Description:         Get Students from the database         */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();

$data = json_decode( file_get_contents('php://input'));
$id = $data[0]->value;	

$sql = "SELECT * FROM messages where id = $id" ;
if (!$result = mysqli_query($connection, $sql)) {
	exit(mysqli_error($connection));
}

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
	    $message = array();
        array_push($message,$row);
        $data = json_encode($message); 
	}
}
else
{
	$data .= 'No hay mensaje';
}
echo $data;

?>