<?php

    session_start();
    if(!isset($_SESSION["user"])){
        header("Location:../shared/login/index.html");
        die();
    }
    else if($_SESSION["typeUser"]!="Professor"){
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
      <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- end bootstrap css link -->
   <!-- bootstrap link -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- end bootstrap link -->
  <!-- axios  -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!-- end axios-->
    <title>Teacher</title>
</head>

<body>

    <div class="container mt-3">
        <div class="row text-center">
            <div class="col">
                <h4>
                    <?php 
                        echo $_SESSION["user"];
                    ?>
                </h4>
            </div>
            <div class="col">
                <h1>Dashboard Teacher</h1>
            </div>
            <div class="col">
			    <h4>
                    <a href="../shared/logout/logout.php">Logout</a>
                </h4>
            </div>
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#add_new_record_modal">Agregar Alumno</button>
        </div>
    </div>
    <!-- Starts Add Modal-->
    <div class="modal fade" id="add_new_record_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formAdd">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formControlLabel">Nombre del Alumno</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="formControlLabel">Nombre del Tutor</label>
                            <input type="text" class="form-control" name="tutorName" id="tutorName">
                        </div>
                        <div class="form-group">
                            <label for="formControlLabel">Email del Tutor</label>
                            <input type="email" class="form-control" name="tutorEmail" id="tutorEmail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="addRecord()">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Ends Add Modal  -->

    <!-- tutors list-->
    <div class="container mt-3">
        <div class="row">
            <div class="col-4">
                <div id="records_content">
                    
                </div>
            </div>
            <div class="col-8">
                <div id="tutorMessages">
                    
                </div>
            </div>
        </div>
    </div> 
    <!--End Tutors list -->

    <!-- start modal to view message -->
    <div id="viewMessage">
        <div class="modal" tabindex="-1" role="dialog" id="messageModal">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalTitle" >Bandeja de entrada</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="modalBody">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <p id="type" class="text-danger"> <p/>
                        </div>
                        <div class="col">
                            <p id="date" class="text-success"> <p/>
                        </div>
                    </div>
                    <div class="col">
                        <p id="message"> <p/>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
   <!-- end modal to view message -->
    <!-- Modal para enviar mensajes -->
<div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reporte del Alumno</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row m-2">
            <div class="col">
                <h5 class="text-center">Causa</h5>
            </div>
            <div class="col">
                <select id="cause" class="form-select">
                    <option value="No asiste a clases">No asiste a clases</option>
                    <option value="Se porta mal">Se porta mal</option>
                    <option value="Tienes mala notas">Tienes mala notas</option>
                    <option value="No pone atencion">No pone atención</option>
                    <option value="Otra">Otra</option>
                </select>
            </div>
        </div>
        <div class="row m-2">
		    <textarea name="description" id="description" placeholder="Descripción" style="resize:none"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="sendMessageButton" type="button"  class="btn btn-primary">Enviar Mensaje</button>
      </div>
    </div>
  </div>
</div>
<!-- end  Modal para enviar mensajes -->
    <script src="functions.js"></script>
</body>
</html>
