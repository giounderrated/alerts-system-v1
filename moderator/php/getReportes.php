<?php
/***************************************************************/
/* Program Assignment:  Get Mensajes                           */           
/* Developer            Giovani Flores                         */                                              
/* Date:                21-03-2022                             */                                           
/* Description:         Get Mensajes Tutor                     */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();



$data = '<table class="table table-bordered table-striped">
		<tr>
			<th>Asunto</th>
			<th>Fecha del Reporte</th>
			<th>Mostrar mensaje reportado</th>
			<th>Eliminar Mensaje</th>
		</tr>';
		

$sql = "SELECT * FROM reports" ;
if (!$result = mysqli_query($connection, $sql)) {
	exit(mysqli_error($connection));
}

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result))
	{
		$data .= "<tr>
					<td>" . $row['type'] . "</td>
					<td>" . $row['date_created'] . "</td>
					<td>
					    <button onclick='showReport(".$row['id'].",".$row['id_message'].")' class='btn btn-info'><i class='fa-solid fa-envelope-open-text'></i></button>
					</td>
					<td>
					    <button type='button' class='btn btn-danger'><i class='fa-solid fa-circle-minus'></i></button>
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