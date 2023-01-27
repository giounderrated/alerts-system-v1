<?php

function conectar(){
     $host="localhost";
     $user="lumacadc_alertas_rootuser";
     $password="ejP^KyX2B&bY";
     $dbname="lumacadc_alertas_06042022";
     
     $con = new mysqli($host, $user, $password, $dbname);
     if(!$con) die("Error en la conexion ".mysqli_connect_error()); 
     //else echo "Conexión exitosa";
     
     return $con;
}

//$conexion=conectar();
?>
