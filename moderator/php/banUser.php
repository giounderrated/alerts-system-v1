<?php
$data =file_get_contents('php://input');
//echo $data;
include_once("../../bd.php");
$connection= conectar();
$ban = "Select ban from users where id=$data";
$result=mysqli_query($connection, $ban);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_row($result)){
		$ban=$row[0];
	}
}
//echo "el estado es $ban \n";
if($ban==0){
	$sql = "Update users set ban=1 where id=$data";
}else if($ban==1){
	$sql = "Update users set ban=0 where id=$data";
}

if (!$result = mysqli_query($connection, $sql)) {
	echo "Error en el baneo";
	exit(mysqli_error($connection));
}else{
	
	if($ban==0){
	echo "El Usuario $data ha sido baneada";
}else if($ban==1){
	echo "El Usuario $data ha sido desbaneada";
}
}

?>