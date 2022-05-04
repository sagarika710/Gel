<?php
require './db.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- header link Integration -->
    <?php
    include "./Components/header-links.php";
    ?>
    <title>Galileo Life | Smart-clinic</title>

</head>

<body class="smart-clinic-page">
<div class="service-page">
    <div class="body">
        <!-- Dynamic Navbar -->
        <?php
        $page = 'services';
        include "./Components/Nav.php";
        ?>

        <div class="container page-body">
            <section class="section section-1">

                <?php
                    $section = 'smart-clinic-header';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-evenly align-items-center text-left min_hight_100">
                        <div class=" p-4 body-content col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <h2 id="">
                            '.$row['page_heading'].'</h2>
                            <small class="small-text">'.$row['page_content_small'].'</small><br>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#clinicModal" class="page-btn">Schedule a Visit</button>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 justify-content-center">
                            <img class="section-img" src="./Assets/Images/'.$row['image'].'" alt="">
                        </div>
                    </div>';
                        $slno++;
                    }
                    ?>
            </section>



            <!-- schedule a visit Modal -->
            <div class="modal fade clinicListModal" id="clinicModal" tabindex="-1" aria-labelledby="clinicModalLabel" aria-hidden="true">
                <div class="modal-dialog clinic-dialog">

                    <div class="modal-content">
                        <div class="modal-header clinic-modal-header justify-content-right">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-title clinic-modal-title">
                            <h3 class="" id="exampleModalLabel">
                                Schedule a Visit
                            </h3>
                            <h6>Select your Clinic</h6>
                        </div>

                        <div class="modal-body clinic-wraper">
                            <div class="row d-flex">
                                <?php
                                    $status = 1;
                                    $section = 'smart-clinic-pharmacy';
                                    $sql = "SELECT * FROM smart_clinic_pharmacy where status= '$status' and section='$section' order by id";
                                    $result = mysqli_query($conn, $sql);
                                    $slno = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<div class="col-sm-4 d-flex justify-content-center">
                                        <div class="clinic-container text-wrap">
                                            <input type="checkbox" id="checkbox'.$row['id'].'">
                                            <label for="checkbox'.$row['id'].'"></label>
                                            <div class="clinic-info">
                                                <h3>'.$row['pharmacy_name'].'</h3>
                                                <a target="_blank" href="'.$row['address_link'].'"><p class="card-text"><img src="./Assets/Images/address.png" alt="">&nbsp; '.$row['address'].'</p></a>
                                                <p class="card-text"><i class="fas fa-phone" style="color:#917cff; font-size:large; margin-right: 5px"></i> <a style="color: #000;" href="tel:'.preg_replace('/\s+/', '', $row['phone']).'">'.$row['phone'].'</a></p>
                                                <p class="card-text"><img src="./Assets/Images/fax.png" alt="">&nbsp; '.$row['fax'].'</p>
                                                
                                            </div>
                                            <div class="clinic">
                                                <div class="title">
                                                    <h3>Contact no.</h3>
                                                    <h4><a href="tel:'.preg_replace('/\s+/', '', $row['phone']).'">'.$row['phone'].'</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div> ';
                                        $slno++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal end -->


            <section class="section section-2 mt-4">
                <br><br>
                 <?php
                    $status = 1;
                    $section = 'smart-clinic-sub-header';
                    $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="">
                    <h2 class="visit_smart_clinic">'.$row['page_heading'].'</h2>
                    <small class="card-text">'.$row['page_content_small'].'</small>
                    </div>';
                    $slno++;
                    }

                ?>
               
                <div class="row d-flex justify-content-center align-content-center mt-4">
                    <?php
                          $status = 1;
                          $section = 'smart-clinic-card';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="col-sm-4">
                                <div class="card section-2-card">
                                    <img class="section-2-icons" src="./Assets/Icons/'.$row['image'].'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">'.$row['page_heading'].'</p>
                                    </div>
                                </div>
                            </div>';
                            $slno++;
                         }
                        ?>
                </div>
            </section>
            <section class="section section-3">
                <div class="row d-flex justify-content-center align-items-center">

                     <?php
                          $status = 1;
                          $section = 'smart-clinic-lists-section';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 justify-content-center">
                                    <img class="section-img" src="./Assets/Images/'.$row['image'].'" alt="">
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 body-content">
                                    <h2 class="visit_smart_clinic">'.$row['page_heading'].'</h2>
                                    <small class="small-text">'.$row['page_content_small'].'</small><br>';
                         }

                        ?>
                <style>
                    .lon{
                   
                    position: relative;
                    bottom: 28px;
                    left: 27px;
                    }

                </style>
                        <div class="mt-4">
                        <?php
                          $status = 1;
                          $section = 'smart-clinic-list';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<li class="section-3-list"><div class="lon">'.$row['page_heading'].'</div></li>';
                            $slno++;
                         }

                        ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section section-4" style="margin-top: 5em;">

                    <?php
                          $status = 1;
                          $section = 'smart-clinic-footer';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="row d-flex flex-column-reverse flex-lg-row justify-content-center align-items-center">
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 body-content">
                                <h2 class="visit_smart_clinic">'.$row['page_heading'].'</h2>
                                <small class="small-text">'.$row['page_content_small'].'</small><br>
                                <a href="./contact.php"><button class="page-btn">Know more</button></a>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 justify-content-center">
                                <img class="section-img" src="./Assets/Images/'.$row['image'].'" alt="">
                            </div>
                        </div>';
                            $slno++;
                         }

                        ?>
            </section>
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