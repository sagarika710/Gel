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
    <title>Galileo Life | Pricing Private Pay Selected</title> 
</head>
<body>
    <section class="pricing-private-pay">
    <div class="body">
        <!-- Dynamic Navbar -->
        <?php
        $page = 'pricing';
        include "./Components/Nav.php";
        ?>
        <div class="container page-body">
            <div style="overflow:hidden">
            <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-10">
                            <h1 class="heading">Select Your Consultation Type</h1>
                        </div>
                        <div class="col-lg-6 col-md-10 col-sm-10">
                            <div class="free">
                                <h5 class="animate-charcter">Free for OHIP insured patients</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .animate-charcter {
                        font-size: 35px;
                        font-weight: 800;
                        text-transform: uppercase;
                        background-image: linear-gradient(-225deg,
                                #231557 0%,
                                #44107a 29%,
                                #ff1361 67%,
                                #fff800 100%);
                        background-size: auto auto;
                        background-clip: border-box;
                        background-size: 200% auto;
                        color: #fff;
                        background-clip: text;
                        text-fill-color: transparent;
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        animation: textclip 2s linear infinite;
                        display: inline-block;
                    }

                    @keyframes textclip {
                        to {
                            background-position: 200% center;
                        }
                    }
                </style>
                <div class="col-12">
                    <div class="row">

                    <?php
                        
                        $section = 'pricing';
                        $sql = "SELECT * FROM `pricing_details` where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $data = array();
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            echo '<div class="col-lg-6 col-md-6 col-sm-10">
                                    <div class="box toggle removebg">
                                    
                                        <h3 class="box_heading">'.$row['page_heading'].'</h3>
                                        <p class="pragraph">'.$row['page_content_small'].'</p>
                                        <p class="price_visit">'.$row['page_content_more'].' / Visit</p>
                                    </div>
                                </div>';

                            $slno++;
                        }
                    ?>
                    </div>
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