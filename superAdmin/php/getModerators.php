<?php
/***************************************************************/
/* Program Assignment:  Get Moderators                         */           
/* Developer            Fernanda Reyes                         */                                              
/* Date:                30-04-2022                             */                                           
/* Description:         Get Moderators from the database       */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();

// ENCABEZADOS DE LA TABLA PARA MOSTRAR MODERADORES
$data = '<table class="table table-bordered table-striped">
		<tr>
			<th>Id</th>
			<th>Correo electrónico</th>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Borrar</th>
		</tr>';
		

$sql = "SELECT * FROM users WHERE type='Moderator'" ;


if (!$result = mysqli_query($connection, $sql)) {
	exit(mysqli_error($connection));
}

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result))
	{

		$data .= 	"<tr>
					<td>	" . $row["id"] . 			"		</td>
          				<td>	" . $row["email"] . 		"		</td>
          				<td>	" . $row["name"] . 		"		</td>
          				<td>	" . $row["date_created"] . 	"		</td>
          				<td>
						<button onclick='deleteModerator(".$row['id'].")' class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
					</td>
				</tr>";
	}
}
else
{

	$data .= '<tr><td colspan="6">NO RECORDS</td></tr>';
}
$data .= '</table>';
echo $data;

?>