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
    <title>Galileo Life | About</title>
    <!-- <link rel="stylesheet" href="./Assets/Css/Service.css"> -->
</head>

<body>
    <style>
        .accordion-button::after {
  width: auto;
  height: auto;
  content: "+";
  font-size: 40px;
  background-image: none;
  font-weight: 100;
  color: #1b6ce5;
  transform: rotate(90deg);
}

.accordion-button:not(.collapsed)::after {
  width: auto;
  height: auto;
  background-image: none;
  content: "-";
  font-size: 48px;
  transform: rotate(0deg);
}
</style>

<section class="about">
  <!-- banner -->
  <div class="banner">
        <img class="design1" src="./Assets/Images/design1.png">
        <img class="design2" src="./Assets/Images/design2.png">

        <?php
                $section = 'about-header';
                $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
                $result = mysqli_query($conn, $sql);
                $slno = 1;
                while($row = mysqli_fetch_assoc($result)){

                    echo '
                        <div class="data">
                        <h1>'.$row['page_heading'].'</h1>
                        <br>
                        <p>'.$row['page_content_small'].'</p>
            
                    </div>';

                    $slno++;
                }
            ?>

    </div> <br><br>
        <!-- Dynamic Navbar -->
        <?php
        $page = 'about';
        include "./Components/Nav.php";
        ?>
    <div class="body">
        <div class="container">
            <?php
                $section = 'about-sub-head';
                $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
                $result = mysqli_query($conn, $sql);
                $slno = 1;
                while($row = mysqli_fetch_assoc($result)){

                    if($slno % 2 !=0){
                        echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center justify-content-evenly gy-5 min_hight_100">
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6"><br><br><br>
                                    <h2 class="left-heading">'.$row['page_heading'].'</h2>
                                    <p class="service_paragraph" style="text-align: justify;">'.$row['page_content_small'].'</p>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                    <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt="img">
                                </div>
                            </div>';
                    }
                    else{
                        echo '<div class="row  flex-lg-row d-flex justify-content-center align-items-center gy-5 min_hight_100">
                            <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <img class="w-100 img-fluid" src="./Assets/Images/'.$row['image'].'" alt="img">
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                                <h2>'.$row['page_heading'].'</h2>
                                <p class="service_paragraph" style="text-align: justify;">'.$row['page_content_small'].'</p>
                            </div>
                        </div>';
                    }
                    $slno++;
                }
                ?>
        </div>
    </div>


    <div class="accordian-section">
        <img class="right-icon" src="./Assets/Images/design1.png">
        <img class="left-icon" src="./Assets/Images/design2.png">
        <div class="body">
            <div class="container">
                <h2>Our Benefits</h2>
                <p class="benefit_smallheading">At Galileo Life, we are committed to providing care that is respectful, responsive, and professional. Here’s how:</p>
                <div class="accordion" id="accordionExample">
                    <?php
                        $section = 'about-accordian';
                        $sql = "SELECT * FROM about_details where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            echo '<div class="accordion-item mb-4">
                                <h2 class="accordion-header" id="heading'.$row['id'].'">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['id'].'" aria-expanded="false" aria-controls="collapse'.$row['id'].'">
                                        <img src="./Assets/Images/'.$row['image'].'" alt="" style="width: 40px; height: 40px; float: left; margin-inline: 20px" />'.$row['page_heading'].'
                                    </button>
                                </h2>
                                <div id="collapse'.$row['id'].'" class="accordion-collapse collapse" aria-labelledby="heading'.$row['id'].'" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">'.$row['page_content_small'].'
                                    </div>
                                </div>
                            </div>';

                            $slno++;
                        }
                      ?>
                </div>
            </div>
        </div>
    </div>

</section>
  



    <!-- Footer Integration -->
    <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>
</body>

</html>