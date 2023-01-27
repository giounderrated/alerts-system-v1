<?php
session_start();
/***************************************************************
    Program Assignment:  Login
    Developer            Giovani Flores      
    Date:                2022 05 06
    Description:         Authorize User 
***************************************************************/

public function authorizeUser($user, $type){
    if(!isset($user) or !isset($type)){
        header("Location:../shared/login/index.html");
        die();
    }
    else{
        loginByUserType($type)
    }
}

public function loginByUserType($type){
    if($type == "SuperAdministrator"){
        header("Location:../SuperAdmin/index.php");
        die();
    }
    else if($type == "Moderator"){
        header("Location:../Moderator/index.php");
        die();
    }
    else if($type == "Professor"){
        header("Location:../Teacher/index.php");
        die();
    }
    else if($type == "Tutor"){
        header("Location:../Tutor/index.php");
        die();
    }
    else{
        header("Location:../shared/login/index.html");
        die();
    }

}

 ?>