<?php
session_start();
//if(isset($_SESSION["user"])){
	$_SESSION = array();
	//$_SESSION["user"]=NULL;
	//$_SESSION["typeUser"]=NULL;
	session_unset(); 
	session_destroy();
	header("location:../login/index.html");
//}
?>