<?php 
include "../bd.php";
include_once "../core/cors.php";
header("Access-Control-Allow-Origin: *");
$link = conectar();

$_POST = json_decode(file_get_contents("php://input"),true);

$data = json_decode(file_get_contents('php://input'));

$email = $data[0]->value;
$username = $data[1]->value;
$password = $data[2]->value;
//$email = $_POST["email"];
//$username = $_POST["username"];
//$password = $_POST["password"];


$type = "Moderator";


$sql = "INSERT INTO Users (type, username, email,password)
VALUES ('$type', '$username', '$email','$password')";

if(mysqli_query($link, $sql)){
    echo "EL usuario se agregó correctamente";
}
else{
    echo "Error al registrar al usuario : $sql";
}
mysqli_close($link);
?>