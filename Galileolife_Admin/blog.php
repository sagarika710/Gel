<?php 

session_start();
if(!isset($_SESSION['username'])){
  header("Location: ./login.php");
}
else{
  $admin_name = $_SESSION['username'];
}

require "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon -->
  <link rel="shortcut icon" href="../Assets/Images/favicon.png" type="image/x-icon">
  <title>Galileo Life || Admin | Blog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Dataatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./logout.php" role="button">
          Logout <i class="fa fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://galileolife.com/" class="brand-link">
      <img src="../Assets/Images/favicon.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Galileo Life</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <i class="fa fa-user img-circle elevation-2 text-light"></i>
        </div>
        <div class="info">
        <a href="#?" class="d-block"><?php echo $admin_name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./about.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                About Us
              </p>
            </a>
          </li>
            <!-- drop down -->
            <li class="nav-item">
            <a href="#?" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./service.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primary Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor-on-call.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consult Doctor Online</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./smart-clinic.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Smart Clinic Near</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./doctor-at-home.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Call Doctor Home</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- ./dd -->
          <li class="nav-item">
            <a href="./pricing.php" class="nav-link">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Pricing
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="./contact.php" class="nav-link">
              <i class="nav-icon fa fa-phone-square"></i>
              <p>
               Contact us
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="./blog.php" class="nav-link active">
              <i class="nav-icon fa fa-comments"></i>
              <p>
               Blog
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="./joinus.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
               Join us Details
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blog Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-4">
        <div class="card col-md-3 mx-2">
        <div class="card-header">            
            <h5 class="card-title mb-2">Blog Sub Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"> Add About Content </button>
          </div>
        </div>
        <div class="card col-md-3 mx-3">
        <div class="card-header">            
            <h5 class="card-title mb-2">Blog Content Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-blog"> Add Blog Content </button>
          </div>
        </div>
        </div>
        <!-- slider data table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">About Blog DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="blog-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                      $section = 'blog-content';
                      $sql = "SELECT * FROM blog_details where page_section= '$section' order by id";
                      $result = mysqli_query($conn, $sql);
                      $slno = 1;
                      while($row = mysqli_fetch_assoc($result)){
                          echo '<tr>
                                  <td>'.$slno.'</td>
                                  <td><img src="../Assets/BlogImages/'.$row['blog_banner'].'" alt="'.$row['blog_banner'].'" class="img-fluid" width="100px" height="100px"></td>
                                  <td>'.$row['title'].'</td>
                                  <td>'.$row['short_desc'].'</td>
                                  <td><button type="button" class="btn btn-primary blog-edit" id="'.$row['id'].'">Edit</button></td>
                                  <td><button type="button" class="btn btn-danger blog-delete" id="d'.$row['id'].'">Delete</button></td>
                              </tr>';

                          $slno++;
                      }
                    ?>
                    <!-- tbl content -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.slider-table-col -->
          <!-- home-service-section -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Blog Content DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="blog-content-table" class="table table-bordered table-striped table-responsive" style="table-layout: fixed;">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Blog banner</th>
                    <th>Heading</th>
                    <th>Small Content</th>
                    <th>More Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                      $section = 'blogs';
                      $sql = "SELECT * FROM blog_details where `page_section`= '$section' order by id";
                      $result = mysqli_query($conn, $sql);
                      $slno = 1;
                      while($row = mysqli_fetch_assoc($result)){

                          echo '<tr>
                                  <td>'.$slno.'</td>
                                  <td><img src="../Assets/BlogImages/'.$row['blog_banner'].'" alt="'.$row['blog_banner'].'" class="img-fluid" width="100px" height="100px"></td>
                                  <td>'.$row['title'].'</td>
                                  <td style="overflow:hidden;
                                  text-overflow: ellipsis;">'.$row['short_desc'].'</td>
                                  <td style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4;  line-clamp: 4;-webkit-box-orient: vertical;">'.$row['long_desc'].'</td>
                                  <td><button type="button" class="btn btn-primary full-blog-edit" id="'.$row['id'].'">Edit</button></td>
                                  <td><button type="button" class="btn btn-danger full-blog-delete" id="d'.$row['id'].'">Delete</button></td>
                              </tr>';

                          $slno++;
                      }
                    ?>
                    <!-- tbl content -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./home-service-section -->
        </div>
    <!-- /.content -->

    
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021-2022 <a href="https://galileolife.com/">Galileo Life</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

      <!-- modal main screen -->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Blog About Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <!-- <form id="quickForm" method="POST" action="../DB_process/blog_process?oper=blog-about" enctype="multipart/form-data"> -->
               <form id="quickForm" method="POST" action="../DB_process/blog_process.php?oper=blog-about" enctype="multipart/form-data">
                 <input type="hidden" name="b-hidId" id="b-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading">Enter heading</label>
                    <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6character long">
                  </div>
                  <div class="form-group">
                    <label for="content">Enter small content</label>
                    <textarea name="content" class="form-control" id="content" placeholder="Enter content" required minlength="6" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image">Enter image <span style="color:red; font-size:10px;">* (Only jpg/jpeg/png )</span></label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image">
                  </div>
                  <span id="display-img-blog"></span>
                </div>
                <!-- /.card-body -->
              <!-- ./modal-content -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="blog-about-btn">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- modal main screen -->
      <div class="modal fade" id="modal-lg-blog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Full Blog Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <!-- <form id="quickForm1" method="POST" action="../DB_process/blog_process?oper=full-blog-content" enctype="multipart/form-data"> -->
               <form id="quickForm1" method="POST" action="../DB_process/blog_process.php?oper=full-blog-content" enctype="multipart/form-data">
                 <input type="hidden" name="c-hidId" id="c-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="blog-heading">Enter Blog Title</label>
                    <input type="text" name="blog-heading" class="form-control" id="blog-heading" placeholder="Enter Heading" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6character long">
                  </div>
                  <div class="form-group">
                    <label for="blog-small-content">Enter small description</label>
                    <textarea name="blog-small-content" class="form-control" id="blog-small-content" placeholder="Enter small description" minlength="6" cols="30" rows="5"></textarea>
                    <!-- <input type="text" name="blog-small-content" class="form-control" id="blog-small-content" placeholder="Enter small description" required minlength="6"> -->
                  </div>
                  <div class="form-group">
                    <label for="blog-more-content">Enter long description</label>
                    <textarea name="blog-more-content" class="form-control" id="blog-more-content" placeholder="Enter long description"  minlength="6" cols="30" rows="10">
                    </textarea>

                    <!-- <input type="text" name="blog-more-content" class="form-control" id="blog-more-content" placeholder="Enter long content" required minlength="6"> -->
                  </div>
                  <div class="form-group">
                    <label for="blog-image">Enter blog image</label>
                    <input type="file" name="blog-image" class="form-control" id="blog-image" placeholder="Enter image">
                  </div>
                  <span id="display-blog-img"></span>
                </div>
                <!-- /.card-body -->
              <!-- ./modal-content -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="blog-content-btn">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Update -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- html editor --> 
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<!-- Page specific script -->
<script>
  $(document).ready( function () {
    $('#blog-table').DataTable();
    $('#blog-content-table').DataTable({
    "bJQueryUI": true,
    "bAutoWidth": false, // Disable the auto width calculation 
    "aoColumns": [
      { "sWidth": "10%" }, // 1st column width 
      { "sWidth": "10%" }, // 2nd column width 
      { "sWidth": "20%" }, // 2nd column width 
      { "sWidth": "40%" }, // 2nd column width 
      { "sWidth": "70%" }, // 2nd column width 
      { "sWidth": "10%" }, // 2nd column width 
      { "sWidth": "10%" } // 3rd column width and so on 
    ]
    });
    var bid =document.getElementById('b-hidId');
    bid.value = "";
    var cid =document.getElementById('c-hidId');
    cid.value = "";

    let editor;

    ClassicEditor
        .create( document.querySelector( '#blog-more-content' ) ,{
          toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote','Table',, 'mediaEmbed', 'insertTable', '|', 'indent', 'outdent', '|', 'code', '|', 'imageEmbed',  '|', 'undo', 'redo' ],
        })
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );

    
    // ClassicEditor.create( document.querySelector( '#blog-more-content' ) );
    $('#modal-lg').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-blog').html('');
    });
    $('#modal-lg-blog').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-blog-img').html('');      
      $('#blog-more-content').html('');
      // var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname;    
      //   window.history.pushState({ path: refresh }, '', refresh);
      editor.setData( '' );
    });

  
// });
$("#blog-table tbody").on("click", ".blog-edit", function(e){

  // blog_edits = document.getElementsByClassName('blog-edit');
  // Array.from(blog_edits).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('b-hidId');
       var heading = document.getElementById('heading');
       var content = document.getElementById('content');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img-blog").html(imgs);  
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       content.value = tr.getElementsByTagName('td')[3].innerHTML;
     
       $('#modal-lg').modal('toggle');

  //     });
  // });
  
});

$("#blog-table tbody").on("click", ".blog-delete", function(e){

  // blog_deletes = document.getElementsByClassName('blog-delete');
  // Array.from(blog_deletes).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('b-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/blog_process.php?oper=delete-blogabout&id="+id.value;
       }
  //     });
  // }); 
  
});

$("#blog-content-table tbody").on("click", ".full-blog-edit", function(e){

  // edits = document.getElementsByClassName('full-blog-edit');
  // Array.from(edits).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('c-hidId');
       var heading = document.getElementById('blog-heading');
       var small = document.getElementById('blog-small-content');
       var large = document.getElementById('blog-more-content');
       id.value = e.target.id;

        editor.setData(tr.getElementsByTagName('td')[4].innerHTML);
        
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;

      $("#display-blog-img").html(imgs);  
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       small.value = tr.getElementsByTagName('td')[3].innerHTML;
       large.value = tr.getElementsByTagName('td')[4].innerHTML;
      $('#modal-lg-blog').modal('toggle');

  //     });
  // });

});

$("#blog-content-table tbody").on("click", ".full-blog-delete", function(e){
  // deletes = document.getElementsByClassName('full-blog-delete');
  // Array.from(deletes).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('c-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/blog_process.php?oper=delete-blog&id="+id.value;
       }
  //     });
  // });
});
  
 

});
</script>

</body>
</html>
