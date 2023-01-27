
<?php
    session_start();
    /***************************************************************
        Program Assignment:  Login 
        Developer            Giovani Flores 
        Date:                28-03-2022 
        Description:         This code allows the redirection based on roles 
    /***************************************************************/
    if($session = isset($_SESSION["user"])){
		checkUserAccessByType();
    }
    else{
        header("Location:./login/index.html");
        die();
    }

	function checkUserAccessByType(){
		if($_SESSION["typeUser"]=="Professor"){
			header("Location:../teacher/index.php");
			die();
		}
		else if($_SESSION["typeUser"]=="Tutor"){
			header("Location:../tutor/index.php");
			die();
		}
		else if($_SESSION["typeUser"]=="Moderator"){
			header("Location:../moderator/index.php");
			die();
		}
		else if($_SESSION["typeUser"]=="SuperAdministrator"){
			header("Location:../superAdmin/index.php");
			die();
		}
	}
?>