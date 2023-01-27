<?php
include " ../bd.php";
$link = conectar();
session_start();
   if(!$session = isset($_SESSION["user"])){
       header("Location:../shared/login/index.html");
       die();
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdministrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SuperAdministrator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
<!-- Modal Add Empieza-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Moderador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formAdd">
        <div class="modal-body">
              <div class="form-group">
                  <label for="exampleFormControlInput1">Correo</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Usuario</label>
                  <input type="input" class="form-control" name="username" id="username">
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Contraseña</label>
                  <input type="input" class="form-control" name="password" id="password">
              </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Add Termina  -->

<h1 style="margin-left:35%;">Dashboard Superadmin</h1>
<div id="container"  style="width:45%;margin:auto;margin-top:5%;">

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>


<table class="table .table-sm">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
      <th>Password</th>
      <th>Date</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql = "SELECT * FROM users where type='Moderator'";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));
      while ($row = mysqli_fetch_array($result)) {
      echo "
        <tr>
          <td>" . $row["id"] . "</td>
          <td>" . $row["name"] . "</td>
          <td>" . $row["email"] . "</td>
          <td>" . $row["password"] . "</td>
          <td>" . $row["date_created"] . "</td>
          <td> 
            <button type='button' class='btn btn-info' ><a href='editModerator.php?id=".$row["id"]."'>Editar</a></button>
          </td>
          <td> 
            <button type='button' class='btn btn-danger' ><a href='dropModerator.php?id=".$row["id"]."'>Eliminar</a></button>
          </td>
        <tr/>
      ";
      }
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
  </tbody>
</table>

<script>
  $(document).ready(function(){

    $('#formAdd').on("submit", (function (e){
      e.preventDefault();
      let formValues = $(this).serializeArray();
      // console.log(formValues);
     
      axios.post("moderator/add.php", formValues, {
      }).then((response) => {
        alert(response.data);
      
        setTimeout(() => {
            location.reload();
        },500);
      }).catch((error) => {
          alert(error);
      })

      $(this)[0].reset();
      $(this)[1].reset();
      $(this)[2].reset();
    }));

  });
</script>

</div>
</body>
</html>