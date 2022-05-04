<?php

require './db.php';
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header link Integration -->
    <?php
    include "./Components/header-links.php";
    ?>
    <title>Galileo Life | Blogs</title>


</head>

<body>

    <div class="container">
        <?php

        $section = 'blogs';
        $sql = "SELECT * FROM blog_details where page_section= '$section' and id = '$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="row align-items-top gy-5 justify-content-evenly min_hight mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <h1 class="card-title">'.$row['title'].'</h1>
                        <h4 style="word-break: break-all;">'.$row['short_desc'].'</h4>
                 
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <img class="w-100 img-fluid" src="./Assets/BlogImages/'.$row['blog_banner'].'" alt="img">
            </div>
        </div>

        <div class="row">
            <div class="col-12" style="word-break: break-all;">
            '.$row['long_desc'].'               
            </div>
        </div>';
        }

        ?>
           


    </div>
   

        
    <!-- Footer Integration -->
    <!-- Footer Integration -->
    <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>
  

</body>

</html>