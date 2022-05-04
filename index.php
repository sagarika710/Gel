<?php 

require './db.php';
?>
<!doctype html>
<html lang="en">

<head>

<?php include './Components/header-links.php'; ?>

    <title>Galileo Life | Home</title>

</head>

<body>
    <!-- Dynamic Navbar -->
    <?php
    $page = 'home';
    include "./Components/Nav.php";
    ?>


<section class='home-page'>

   <!-- section-1 -->
   <section class="section-1 container" style="padding-left: 0px;">
        <div id="main" class="owl-carousel owl-theme section-1-carousel">
            <div class="item">
                <a href="./Doctor-on-call.php">
                    <div class="card section-1-card home-card-1">
                    </div>
                </a>
            </div>
            <div class="item">
                <a href="./Smart-clinic.php">
                    <div class="card section-1-card home-card-2">
                    </div>
                </a>
            </div>
          <div class="item">
                <a href="./doctor_at_home.php">
                    <div class="card section-1-card home-card-3">
                    </div>
                </a>
            </div> 
        </div>
    </section>

    <!-- section-2 -->
    <div class="body">
        <section class="section-2 container">
            <h2 class="head">Our Services</h2>
            <div id="nonLoop" class="owl-carousel owl-theme">
            <?php
                    $section = 'home_service';
                    $sql = "SELECT * FROM home_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){
                    
                            echo'
                            <div class="card" data-city="buda'.$row['id'].'">
                            <div id="myDIV" class="section-2-card w-100 qw " style="width: 18rem;">
                                <img src="./Assets/Images/'.$row['image'].'" class="card-img-top section-2-icon" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['page_heading'].'</h5>
                                    <p class="card-text small_paragraph" style="text-align: justify;">
                                        '.$row['page_content_small'].'
                                        <span class="dots">...</span>
                                        <span class="more" style="display: none;">
                                        '.$row['page_content_small'].'
                                        </span>
                                    </p>
                                    <button onclick="readMore(\'buda'.$row['id'].'\')"class="myBtn1">READ MORE</button>
        
                                </div>
                            </div>
                        </div>';
                    }

                    ?>
            </div>
        </section>

        <!-- section-3 -->
        <section class="section-3 container">
            <h2 class="head">Our Benefits</h2>
            <div id="nonLoop2" class="owl-carousel owl-theme">
            <?php
                        $section = 'home_benefits';
                        $sql = "SELECT * FROM home_details where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){
                      
                            echo'
                            <div class="card" data-city="buda'.$row['id'].'">
                            <div id="myDIV" class="section-2-card w-100 qw " style="width: 18rem;">
                                <img src="./Assets/Images/'.$row['image'].'" class="card-img-top section-2-icon" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['page_heading'].'</h5>
                                    <p class="card-text small_paragraph" style="text-align: justify;">
                                        '.$row['page_content_small'].'
                                        <span class="dots">...</span>
                                        <span class="more" style="display: none;">
                                        '.$row['page_content_more'].'
                                        </span>
                                    </p>
                                    <button onclick="readMore(\'buda'.$row['id'].'\')"class="myBtn1">READ MORE</button>
        
                                </div>
                            </div>
                        </div>';
                            }

                    ?>
            </div>
        </section>

</section>
 
        <script>
            // read more read less
            function readMore(city) {
                let dots = document.querySelector(`.card[data-city="${city}"] .dots`);
                let moreText = document.querySelector(`.card[data-city="${city}"] .more`);
                let btnText = document.querySelector(`.card[data-city="${city}"] .myBtn1`);
                let qw = document.querySelector(`.card[data-city="${city}"] .qw`);

                if (dots.style.display === "none") {
                    dots.style.display = "inline";
                    btnText.textContent = "READ MORE";
                    moreText.style.display = "none";

                    qw.classList.toggle("mystyle");
                } else {
                    dots.style.display = "none";
                    btnText.textContent = "READ LESS";
                    moreText.style.display = "inline";
                    qw.classList.toggle("mystyle");
                }
            }
        </script>

    </div>
    <!-- Footer Integration -->
    <!-- Footer Integration -->
    <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>
</body>

</html>