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
  <!-- <link rel="stylesheet" href="./Assets/Css/blog.css"> -->
    <title>Galileo Life | Blogs</title>
</head>

<body>
    <section class="blog-page">

       <!-- banner -->
       <div class="banner">

            <img class="design" src="./Assets/Images/banner.png">
        </div>
        <div class="body">
        <!-- Dynamic Navbar -->
        <?php
        $page = 'blog';
        include "./Components/Nav.php";
        ?>
        <div class="container">


            <!-- 1st image section -->
            <?php
            $section = 'blog-content';
            $sql = "SELECT * FROM blog_details where page_section= '$section' order by id";
            $result = mysqli_query($conn, $sql);
            $slno = 1;
            while($row = mysqli_fetch_assoc($result)){

                if($slno %2 != 0){
                    echo ' <div class="row align-items-center gy-5 justify-content-evenly min_hight">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <img class="w-100 img-fluid" src="./Assets/BlogImages/'.$row['blog_banner'].'" alt="img">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <h2>'.$row['title'].'</h2>
                                <p class="service_paragraph">'.$row['short_desc'].'
                                </p>
                            </div>
                        </div>';
                }
                else{
                    echo '<div class="row flex-column-reverse flex-lg-row d-flex justify-content-center align-items-center gy-5 min_hight">
                    <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                        <h2>'.$row['title'].'</h2>
                        <p class="service_paragraph">'.$row['short_desc'].'</p>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6">
                        <img class="w-100 img-fluid" src="./Assets/BlogImages/'.$row['blog_banner'].'" alt=" img">
                    </div>
                </div>';
                }
                $slno++;
            }
            ?>


        </div>

<!-- section-3 -->
<section class="section-3 container">
    <h2 class="head">Our Blogs</h2>
    <div class="col-12" style="margin-top: 20px;">
        <div class="row">
        <?php
                $limit = 2;
                $pgno = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($pgno - 1) * $limit;
                // Create connection
                $section = 'blogs';
                $sql = "SELECT * FROM blog_details where page_section= '$section' ORDER BY  `created_on` DESC LIMIT $offset, $limit";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $datetime = new DateTime( $row['created_on']);
                    echo '<div class="col-12 col-md-12 col-sm-12 col-lg-6 col-xl-6 blog-card" style="margin-bottom: 20px; position:relative;">
                    <div class="card h-100" data-city="buda">
                        <div id="myDIV" class="section-2-card w-100 qw " style="width: 18rem;">
                            <img src="./Assets/BlogImages/'.$row['blog_banner'].'" class="card-img-top section-2-icon" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$row['title'].'</h5>
                                <p class="card-text small_paragraph" style="text-align: justify;">'.$row['short_desc'].'

                                    <span class="dots">...</span>
                                
                                </p>
                                <div class="row blog-card-footer">
                                    <div class="col-6">
                                    <button onclick="redirect('.$row['id'].');" class="myBtn1">READ MORE</button>
                                    </div>
                                    <div class="col-6" style="text-align: right; color:#917cff; font-weight:600"> <i class="fas fa-calendar-alt"></i>
                                        '.$datetime->format( 'Y-m-d' ).'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';                        
                }

                $sql = "SELECT COUNT(*) AS total FROM blog_details where page_section= '$section'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $total_pages = ceil($row["total"] / $limit);

                $previous = $pgno - 1;
                $next = $pgno + 1;


            ?>

        </div>
</section>
<div class="row d-flex align-items-center mt-3">
    <div class="col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
            <?php

                    if($pgno <= 1){
                        echo "<li class='page-item disabled'><a class='page-link' href='./blog.php?page=$previous' aria-label='Previous'> <span aria-hidden='true'>&laquo;</span>
                        <span class='sr-only'>Previous</span></a></li>";
                       
                    }
                    else{                                
                        $previous = $pgno - 1;
                        echo "<li class='page-item'><a class='page-link' href='./blog.php?page=$previous' aria-label='Previous'> <span aria-hidden='true'>&laquo;</span>
                        <span class='sr-only'>Previous</span></a></li>";                              
                    }

                    ?>   
                <?php
                    for($i=1;$i<=$total_pages;$i++){

                        if($i == $pgno){
                            echo "<li class='page-item active'><a class='page-link' href='./blog.php?page=$i'>$i</a></li>";
                        }
                        else{
                            echo "<li class='page-item'><a class='page-link' href='./blog.php?page=$i'>$i</a></li>";
                        }
                    }

                ?>

                 <?php

                    if($pgno < $total_pages){
                        $next = $pgno + 1;
                        echo "<li class='page-item'><a class='page-link' href='./blog.php?page=$next' aria-label='Next'> <span aria-hidden='true'>&raquo;</span>
                        <span class='sr-only'>Next</span></a></li>";
                    }
                    else{
                        echo "<li class='page-item disabled'><a class='page-link' href='./blog.php?page=$next' aria-label='Next'> <span aria-hidden='true'>&raquo;</span>
                        <span class='sr-only'>Next</span></a></li>";
                    }

                 ?>   
            </ul>
        </nav>
    </div>
</div>
</div>

</section>
<!-- Footer Integration -->
    <!-- Footer Integration -->
    <?php
    include "./Components/Footer.php";
    include "./Components/Footerlinks.php";
    ?>

<div class='console-container disp'><span id='text'></span>
<div class='console-underscore' id='console'>&#95;</div>
</div>


 
    <script>
        // function([string1, string2],target id,[color1,color2])    
        consoleText(['Consult A Doctor Online', 'Visit A Smart Clinic Near You', 'Doctor At Home'], 'text', ['#917cff', '#917cff', '#917cff']);

        function consoleText(words, id, colors) {
            if (colors === undefined) colors = ['#fff'];
            var visible = true;
            var con = document.getElementById('console');
            var letterCount = 1;
            var x = 1;
            var waiting = false;
            var target = document.getElementById(id)
            target.setAttribute('style', 'color:' + colors[0])
            window.setInterval(function() {

                if (letterCount === 0 && waiting === false) {
                    waiting = true;
                    target.innerHTML = words[0].substring(0, letterCount)
                    window.setTimeout(function() {
                        var usedColor = colors.shift();
                        colors.push(usedColor);
                        var usedWord = words.shift();
                        words.push(usedWord);
                        x = 1;
                        target.setAttribute('style', 'color:' + colors[0])
                        letterCount += x;
                        waiting = false;
                    }, 1000)
                } else if (letterCount === words[0].length + 1 && waiting === false) {
                    waiting = true;
                    window.setTimeout(function() {
                        x = -1;
                        letterCount += x;
                        waiting = false;
                    }, 1000)
                } else if (waiting === false) {
                    target.innerHTML = words[0].substring(0, letterCount)
                    letterCount += x;
                }
            }, 120)
            window.setInterval(function() {
                if (visible === true) {
                    con.className = 'console-underscore hidden'
                    visible = false;

                } else {
                    con.className = 'console-underscore'

                    visible = true;
                }
            }, 400)
        }
    </script>
    <script>
        function redirect(id) {
            console.log(id);
            window.location = "./fullblog.php?id="+id;
        }
    </script>

</body>

</html>