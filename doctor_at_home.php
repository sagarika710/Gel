<?php 

require "./db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header link Integration -->
    <?php
    include "./Components/header-links.php";
    ?>

    <title>Galileo Life | House On a Call</title>

</head>

<body>
    <!-- Dynamic Navbar -->
    <div class="service-page">
    <div class="body">
        <?php
        $page = 'services';
        include "./Components/Nav.php";
        ?>


        <!-- section-1 -->
        <div class="container section-1">

                <?php
                    $section = 'doctor-at-home-header';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<div class="row  section-1 flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center gy-5 min_hight_100 ">
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                            <h2 class="left-heading">'.$row['page_heading'].'</h2>
                            <p>'.$row['page_content_small'].'</p>
        
                            <button style="background-color: #917cff;
                            padding:2% 3%;
                            color: white;
                            border-radius: 10px;
                            border: 0;
                            outline: none;
                            font-size:18px;
                            font-weight:700;
                            " data-bs-toggle="modal" data-bs-target="#clinicModal">
                                Schedule A Visit
                            </button>
                        </div>
                        <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                            <img class="w-100 img-fluid" src="Assets/Images/'.$row['image'].'" alt="img">
                        </div>
                    </div>';

                        $slno++;
                    }
                ?>
        </div>

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
                        <h6> </h6>
                    </div>

                    <!-- dynamic modal -->
                    <?php
                          $status = 1;
                          $section = 'doctor-at-home';
                          $sql = "SELECT * FROM smart_clinic_pharmacy where status= '$status' and section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo ' <div class="modal-title clinic-modal-title"><br>
                            <h6 ><i class="fas fa-phone" style="color:#917cff; font-size:large; margin-right: 5px"></i><a style="color: #000;" href="tel:'.preg_replace('/\s+/', '', $row['phone']).'">'.$row['phone'].'</a></h6><br>
                            <h6 ><img src="./Assets/Images/email.png" alt="">&nbsp;<a style="color: #000;" href="mailto:'.$row['mail'].'">'.$row['mail'].'</a></h6><br>
                            </div>';
                            $slno++;
                         }

                        ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>


        <!-- section-2 accordian -->
        <div class="accordian-section section-2">
            <div class="container service-page ">

                <?php
                    $section = 'doctor-at-home-subcontent';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<h2>'.$row['page_heading'].'</h2>
                        <p class="accodian_paragraph">'.$row['page_content_small'].'</p>        
                        <p class="accodian_paragraph">'.$row['page_content_more'].'</p>';

                        $slno++;
                    }
                ?>              
                <div class="accordion" id="accordionExample">
                <?php
                
                $section = 'doctor-at-home-accordian';
                $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                $result = mysqli_query($conn, $sql);
                $slno = 1;
                while($row = mysqli_fetch_assoc($result)){

                    echo ' <div class="accordion-item mb-4">
                    <h2 class="accordion-header" id="heading'.$row['id'].'">
                        <button class="accordion-button collapsed" type="button">
                            <img src="./Assets/Images/'.$row['image'].'" alt="" style="width: 30px; float: left; margin-inline: 20px" />'.$row['page_heading'].'
                        </button>
                    </h2>
                    <div id="collapse'.$row['id'].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row['id'].'" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item\'s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>';

                    $slno++;
                }
                ?>
                </div>

                <?php
                    $section = 'doctor-at-home-paragraph';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<p class="mt-5 accodian_paragraph">'.$row['page_content_small'].'</p>';

                        $slno++;
                    }
                    ?>

              </div>
        </div>
    </div>
                </div>
</div>

    <!-- Footer Integration -->
        <!-- Footer Integration -->
        <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>
</body>

</html>