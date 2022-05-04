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
    <title>Galileo Life | Doctor On Call</title>
  
</head>

<body>
<div class="service-page">
    <div class="body">
        <!-- Dynamic Navbar -->
        <?php
        $page = 'services';
        include "./Components/Nav.php";
        ?>
        <div class="container page-body">
            <section class="section section-1">
                <div class="row flex-column-reverse flex-lg-row d-flex justify-content-evenly align-items-center text-left min_hight_100">

                <?php
                        $section = 'service-doctor-on-call';
                        $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            echo '<div class=" p-4 body-content col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <h2 id="">'.$row['page_heading'].'</h2>
                                    <small class="small-text">'.$row['page_content_small'].'
                                    </small><br><br>
                                    
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#clinicModal" class="page-btn">Get Started</button>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 justify-content-center">
                                    <img class="section-img" src="./Assets/Images/'.$row['image'].'" alt="">
                                </div>';

                            $slno++;
                        }
                      ?>
                </div>
            </section>
        </div>
       

       <!-- schedule a visit Modal -->
       <div class="modal fade clinicListModal" id="clinicModal" tabindex="-1" aria-labelledby="clinicModalLabel" aria-hidden="true">
                <div class="modal-dialog clinic-dialog" style="width: 60vw;   ">

                    <div class="modal-content"  style="width: 60vw;    margin-left: -45%;">
                        <div class="modal-header clinic-modal-header justify-content-right">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-title clinic-modal-title">
                            <h5 style="text-align:center" id="exampleModalLabel">
                        To book appointment with virtual doctor Call on 905 346 2151 
                            </h5><br>
                            <h6 style="text-align:center">OR</h6>

                          
                        </div>

                        <div class="container d-flex vertical-center-row" style="padding:2%">
                        <div class="row d-flex align-content-center rounded-3 shadow-md" style="background-color: #fff; padding:5%">
                            <!-- contact us form -->
                            <form id="frmContactUs" method="post" action="./DB_process/contact_us.php">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required minlength="3" pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" title="Please entervalid mail e.g: example@mail.com">
                                            <label for="email">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Phone" minlength="10" maxlength="10" title="Phone no must be 10 digits">
                                            <label for="phone">Phone Number</label>
                                        </div>
                                    </div>
                                   
                                   
                                        <div class="mb-3" style="text-align: center;">
                                            <button type="submit" id="btnContactus" name="contact-btn" class="w-10 btn page-btn">Let's Begin</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
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