<?php

    session_start();
    if(!isset($_SESSION["user"])){
    header("Location:../shared/login/index.html");
    die();
    }
    else if($_SESSION["typeUser"]!="SuperAdministrator"){
        header("Location:../index.php");
        die();
    }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    
    <title>Panel de Super Administrador - SAS</title>
</head>

<body>
    
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col">
                <h6>
                    <?php 
                        echo $_SESSION["user"];
                    ?>
                </h6>
            </div>
            <div class="col">
                <h1>Panel de Super Administrador</h1>
            </div>
            <div class="col">
                <h4>
                    <a href="../shared/logout/logout.php">Logout</a>
                </h4>
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_moderator_modal">        Agregar Moderador
            </button>
        </div>
    </div>





    <!--<div class="container mt-3">
        <div class="row text-center">
            <div class="col">
                <h1>Panel de Super Administrador</h1>
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_moderator_modal">        Agregar Moderador
            </button>
        </div>
    </div>-->

    <!-- ADD NEW MODERATOR MODAL-->
    <div class="modal fade" id="add_moderator_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo moderador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add_moderator_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formControlLabel">Correo electrónico</label>
                            <input type="email" class="form-control" name="email_moderator" id="email_moderator">
                            <label for="formControlLabel">Contraseña</label>
                            <input type="password" class="form-control" name="password_moderator" id="password_moderator">
                            <label for="formControlLabel">Nombre completo</label>
                            <input type="text" class="form-control" name="name_moderator" id="name_moderator">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" onclick="addRecord()">Agregar nuevo +</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END ADD NEW MODERATOR MODAL  -->
    
    
    <!-- RECORDS MODERATORS FROM DATABASE -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-2">
                <!-- RECORDS DISPLAYED FROM JS -->
                <div id="records_content">
                    
                </div>
            </div>
        </div>
    </div>  
    <!--END RECORDS MODERATORS FROM DATABASE-->
    
    
    <script src="./functions.js"></script>
    
</body>

</html>