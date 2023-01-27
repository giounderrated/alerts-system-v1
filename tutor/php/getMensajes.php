<?php
session_start();
/***************************************************************/
/* Program Assignment:  Get Mensajes                           */
/* Developer            Giovani Flores                         */
/* Date:                21-03-2022                             */
/* Description:         Get Mensajes Tutor                     */
/***************************************************************/

include("../../bd.php");
$connection= conectar();

$id_tutor = $_SESSION['id_tutor'];


$data = '<table class="table table-bordered table-striped">
		<tr>
			<th>Asunto</th>
			<th>Mostrar Mensaje Completo</th>
			<th>Eliminar</th>
			<th>Reportar Mensaje</th>
		</tr>';


$sql = "SELECT * FROM messages where id_user = $id_tutor" ;
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
						<button onclick='MostrarMensaje(".$row['id'].")' class='btn btn-info'><i class='fa-solid fa-envelope-open-text'></i></button>
					</td>
					<td>
						<button onclick='DeleteStudent(".$row['id'].")' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
					</td>
					<td>
						<button onclick='reportMessage(".$row['id'].")' class='btn btn-warning'><i class='fa-solid fa-triangle-exclamation'></i></button>
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
