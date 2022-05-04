<?php

require './db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header link Integration -->
    <?php
    include "./Components/header-links.php";
    ?>
    <title>Galileo Life | Service</title>

  
</head>

<body>
    <div class="service-page">
    <div class="body">
        <!-- Dynamic Navbar -->
        <?php
        $page = 'services';
        include "./Components/Nav.php";
        ?>
        <div class="container">


        <?php
                $section = 'primary-care';
                $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                $result = mysqli_query($conn, $sql);
                $slno = 1;
                $list = 1;
                while($row = mysqli_fetch_assoc($result)){

                    if($slno % 2 != 0){

                        if($list == 1){
                                echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center min_hight_100 mt-15 ">
                                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6"><br><br><br>
                                            <h2 class="left-heading">'.$row['page_heading'].'</h2>
                                            <p>'.$row['page_content_small'].'</p>
                                            <div class="col-lg-12">
                                                        <div class="row"> ';
                                $status = 1;
                                $query = "SELECT * FROM primary_disease where status= '$status' order by id";
                                $res = mysqli_query($conn, $query);
                                while($r = mysqli_fetch_assoc($res)){

                                    echo '<div class="col-6">
                                            <li class="disease_name"><a style="color: #6e20ff;" href="./disease.php#'.$r['link_id'].'">'.$r['disease_name'].'</a></li>
                                        </div>';
                                }
                                echo ' </div>
                                    </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                            <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt="img">
                                        </div>
                                    </div>';
                            
                        } //1st section|| 3rd section
                        else{
                            echo ' <div class="row align-items-center gy-5 justify-content-evenly min_hight_100">
                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt="img">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <h2>'.$row['page_heading'].'</h2>
                                <p class="service_paragraph">'.$row['page_content_small'].'</p>
                            </div>
                        </div>';
                        }
                    }
                    else{

                        if($slno == 2){
                            echo ' <div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center gy-5 min_hight_100">
                                    <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                        <h2>'.$row['page_heading'].'</h2>
                                        <p class="service_paragraph">'.$row['page_content_small'].'</p>
                                    </div>
                                    <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                        <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt=" img">
                                    </div>
                                </div>';

                        }
                        else{
                            echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center justify-content-evenly gy-5 min_hight_100">
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                    <h2>'.$row['page_heading'].'</h2>
                                    <p class="service_paragraph">'.$row['page_content_small'].'</p>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                    <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt="img">
                                </div>
                            </div>';

                        }

                    }
                    $slno++;
                    $list++;
                }
            ?>


          
        </div>

    </div>
    </div>
    <!-- Footer Integration -->
    <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>
</body>

</html>