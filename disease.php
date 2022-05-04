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
    <title>Galileo Life | Disease</title>

</head>

<body>
    <!-- Dynamic Navbar -->
    <?php
    include "./Components/Nav.php";
    ?>

    <style>
        .only_web {
            display: block;
        }

        @media (max-width: 800px) {

            .only_web {
                display: none;
            }
        }

        li {
            font-size: 18px;
            color: #000;
        }

        p {
            font-size: 20px;
        }

        h2 {
            padding-top: 5%;
        }
    </style>

    <div class="container">


        <!-- service section -->

        <?php

            $status = 1;
            $query = "SELECT * FROM primary_disease where status= '$status' order by id";
            $res = mysqli_query($conn, $query);
            while($r = mysqli_fetch_assoc($res)){

                
                if($r['disease_name'] == 'Sexual health'){

                    echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center min_hight mt-15  " id="'.$r['link_id'].'" style="text-align: justify;">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <br class="only_web"><br class="only_web"><br class="only_web"><br class="only_web">                        
                        '.$r['long_desc'].'
        
                    </div>
        
                </div>';

                }
                else{
                    echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center min_hight mt-15  " id="'.$r['link_id'].'" style="text-align: justify;">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <br class="only_web"><br class="only_web"><br class="only_web"><br class="only_web">
                        <h2 class="left-heading">'.$r['disease_name'].'</h2>
                        
                        '.$r['long_desc'].'
        
                    </div>
        
                </div>';

                }
               

            }


        ?>
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