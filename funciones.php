<?php

/***************************************************************/
/* Program Assignment:  index                                   */           
/* Developer            Fernanda Reyes                          */                                              
/* Date:                14-04-2022                              */                                           
/* Description:         Mostrar el index de SAS                 */                                             
/***************************************************************/
    function funciones(){
        
        include "bd.php";
        $link = conectar();
    
        $sql = "SELECT* FROM slides";
        $result = mysqli_query($link, $sql);
        
        $sql2 = "SELECT* FROM comments";
        $result2 = mysqli_query($link, $sql2);

        $a=0;
        $html="";

        echo'
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">';
                    while ($row = mysqli_fetch_array($result)) {
                        $url = $row['url'];
                        if($a==0){
                            $html.='
                            <div class="carousel-item active">
                                <img src="/img/slider/'.$url.'"  class="img-fluid w-100" style="height:600px">
                            </div>
                            ';
                        }else{
                            $html.='
                            <div class="carousel-item ">
                                <img src="/img/slider/'.$url.'"  class="img-fluid w-100" style="height:600px">
                            </div>
                            ';
                        }
                        $a++;
                    }
                    $html.='</div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button> 
                    </div>
        ';
        echo $html;
        
        $a=0;
        $b=0;

        echo'
            <br>
            <br>
            <br>
            <br>
            <!-- Carousel wrapper -->
            <div id="carouselComments" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
                <!-- Controls -->
                <div class="d-flex justify-content-center mb-4">
                    <button class="carousel-control-prev position-relative" type="button" data-mdb-target="#carouselComments" data-mdb-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next position-relative" type="button"
                        data-mdb-target="#carouselComments" data-mdb-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
                        <!-- Inner -->
                        <div class="carousel-inner py-4">

        ';
        while ($row = mysqli_fetch_array($result2)) {
            $author = $row['author'];
            $description = $row['description'];
            $url = $row['url'];
            
            $a++;
            if($a==1){
                if($b==0){
                    $active="active";
                }else{
                    $active="";
                }
                echo'
                            <div class="carousel-item '.$active.'">
                                <div class="container">
                                    <div class="row">';
                                    $b++;
            }
            if($a<=3){
                echo'
                                        <!-- Single item -->
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <img
                                                    style="height:400px;"
                                                    src="/img/comments/'.$url.'" 
                                                    class="card-img-top"
                                                    alt="..."
                                                />
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color: #635ba8; text-align: justify;">'.$description.'</h5>
                                                    <h6 class="card-title" style="color: #cac8f1;">-'.$author.'</h6>
                                                </div>
                                            </div>
                                        </div>';
            }
            if($a==3){
                echo'
                                    </div> 
                                </div>
                            </div>';
                    $a=0;
            }
        }
        echo'
                    </div>
                    <!-- Inner -->
                </div>
                <!-- Controls -->
            </div>
            <!-- Carousel wrapper -->
        ';
        
    }
    
?>