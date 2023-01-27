<?php
/***************************************************************
 Program Assignment:  Get Tutors                                     
 Developer            Giovani Flores                                                                      
 Date:                21-03-2022                                                                       
 Description:         Get Students from the database                                                     
/***************************************************************/

include("../../bd.php");
$connection= conectar();
		
$data = '<table>
		<tr>
			<th>Tutor</th>
			<th>Alumno</th>
			<th>Ver</th>
			<th>Enviar Mensaje</th>
		</tr>';
    		

$sql = "SELECT * FROM users where type='Tutor'" ;


if (!$result = mysqli_query($connection, $sql)) {
	exit(mysqli_error($connection));
}
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$data .= "<tr>
					<td class='text-center'>
						<h6>"  . $row['name'] . "</h6>
					</td> 
					<td class='text-center'>
						<h6>"  . $row['student'] . "</h6>
					</td>
					<td class='text-center'>
						<button onclick='getMessages(".$row['id'].")' class='btn btn-primary' > 🖶
						</button>
					</td>  
					<td class='text-center'>
						<button onclick='sendMessage(".$row['id'].")' class='btn btn-danger' >✉
						</button>
					</td>
				</tr>";
	}
}
else
{
	$data .= '<tr><td colspan="6">No hay mensajes</td></tr>';
}
$data .= '</table>';
echo $data;


?>


