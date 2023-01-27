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


$data = '<table class="table table-bordered table-striped" >
		<tr>
			<th>Asunto</th>
			<th>Mostrar Mensaje Completo</th>
			<th>Eliminar</th>
		</tr>';

$sql = "SELECT * FROM messages where id_user = $id" ;
if (!$result = mysqli_query($connection, $sql)) {
	exit(mysqli_error($connection));
}

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data .= "<tr>
					<td>" . $row['type'] . "</td>
					<td>
						<button onclick='showMessage(".$row['id'].")' class='btn btn-info' data-toggle='modal' data-target='#expandMessage'><i class='fa-solid fa-envelope-open-text'></i></button>
					</td>
					<td>
						<button onclick='deleteMessage(".$row['id'].",".$row['id_user'].")' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
					</td>
				</tr>";
	}
}
else
{
	// No hay registros
	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
}
$data .= '</table>';
echo $data;

?>