<?php
include "funciones.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Luckiest+Guy&family=Roboto&display=swap" rel="stylesheet">

    <!--BOOTSTRAP CDN JSDELIVR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

    <!--CDN TABLAS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.2/r-2.2.9/datatables.min.css"/>

    <!--BOOTSTRAP CDN JSDELIVR-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    
    <title>SAS</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
		    <li class="nav-item active">
                    <a class="nav-link" href="/superAdmin/index.php">SuperAdmin</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/moderator/index.php">Moderador</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/teacher/index.php">Profesor</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/tutor/index.php">Tutor</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row mt-5 mb-5">
    <?php
        funciones();
    ?>
    </div>
    
    <footer class="text-center text-white" style="background-color:#c8f1da;">
        <!-- Grid container -->
        <div class="container pt-4">
        <!-- Section: Social media -->
            <section class="mb-3">
                <!-- Facebook -->
                <a
                    class="btn btn-link btn-floating btn-lg text-light m-0.5"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="light"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a
                    class="btn btn-link btn-floating btn-lg text-light m-0.5"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="light"
                    ><i class="fab fa-twitter"></i
                ></a>

                <!-- Instagram -->
                <a
                    class="btn btn-link btn-floating btn-lg text-light m-0.5"
                    href="#!"
                    role="button"
                    data-mdb-ripple-color="light"
                    ><i class="fab fa-instagram"></i
                ></a>

            </section>
             <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center text-light p-3" style="background-color:#b7e4cb;">
            © 2022 SAS Copyright:
        </div>
        <!-- Copyright -->
    </footer>

 
</body>
</html>