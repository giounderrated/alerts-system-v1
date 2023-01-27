<?php 
/***************************************************************/
/* Program Assignment:  Create Students                        */           
/* Developer            Giovani Flores                         */                                              
/* Date:                21-03-2022                             */                                           
/* Description:         Adds a student to the database         */                                             
/***************************************************************/

include("../../bd.php");
$connection = conectar();

function getRandomPassword($length) {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $password = substr(str_shuffle($alphabet), 0, $length);
    return $password;
}

$data = json_decode( file_get_contents('php://input'));
$studentName = $data[0]->value;
$tutorName = $data[1]->value;
$email = $data[2]->value;
$temporalPassword = getRandomPassword(8);
$type = "Tutor";

$query = "INSERT INTO users (email,password,name,type,student) VALUES ('$email', '$temporalPassword', '$tutorName', '$type', '$studentName' )";

if (!$result = mysqli_query($connection, $query)) {
    exit(mysqli_error($connection));
    echo "student creation failed";
}
else{
    echo "student created";
}


?>