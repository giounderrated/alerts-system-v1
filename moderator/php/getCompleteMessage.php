<?php
/***************************************************************/
/* Program Assignment:  Get Message Complete                  */           
/* Developer            Fernanda Reyes                         */                                              
/* Date:                25-04-2022                             */                                           
/* Description:         read the content of the Message         */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();

$data = json_decode( file_get_contents('php://input'));
$id = $data[0]->value;
$id_message = $data[1]->value;


		

$sql = "SELECT * FROM messages where id = $id_message";
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