<?php
/***************************************************************/
/* Program Assignment:  Get Profesores                           */           
/* Developer            Giovani Flores                         */                                              
/* Date:                21-03-2022                             */                                           
/* Description:         Get Profesores from the database         */                                             
/***************************************************************/

include("../../bd.php");
$connection= conectar();
// difinir el encabezado de la tabla
$data = '<table class="table table-bordered table-striped">
		<tr>
			<th">Id</th>
			<th>Asunto</th>
			<th>Contenido</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>';
		
$data2 = '<table align="center" class="table table-bordered table-striped" >
		<tr>
			<th>Tutor</th>
			<th>Email</th>
			<th>Escuela</th>
			<th>Suspender</th>
			<th>Eliminar</th>
		</tr>';
    		

$sql2 = "SELECT * FROM users where type='Tutor'" ;


if (!$result2 = mysqli_query($connection, $sql2)) {
	exit(mysqli_error($connection));
}
if(mysqli_num_rows($result2) > 0)
{

	while($row = mysqli_fetch_assoc($result2)) /* Mostrar el nombre como boton */  
	{

		$data2 .= "<tr>
					<td>"  . $row['name'] . " </button>
					    </td>  
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['school'] . "</td>
                    <td>
                    <button onclick='suspend(".$row['id']. ") '  class='btn btn-warning' >
                    <i class='fa-solid fa-ban'></i>
					    </button>
					    </td>  
					<td><button onclick='MostrarProfesores(".$row['id']. ") ' class='btn btn-danger' >
					<i class='fa-solid fa-circle-minus'></i>
					    </button>
					    </td>  
				</tr>";
	}
}
else
{
	// No hay registros
	$data2 .= '<tr><td colspan="6">No hay registros!</td></tr>';
}
$data2 .= '</table>';
echo $data2;

/*Tabla secundaria*/

?>


