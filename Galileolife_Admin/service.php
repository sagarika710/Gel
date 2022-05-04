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
  <title>Galileo Life || Admin | Service</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
     <!-- Dataatables -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
          <li class="nav-item menu-open">
            <a href="#?" class="nav-link active">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./service.php" class="nav-link active">
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
            <a href="./blog.php" class="nav-link">
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
            <h1 class="m-0">Service Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Service</li>
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
            <h5 class="card-title mb-2">Service Content Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg" disabled> Add Content </button>
          </div>
        </div>
        <div class="card col-md-3 mx-2">
        <div class="card-header">            
            <h5 class="card-title mb-2">Service Disease Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-disease"> Add disease </button>
          </div>
        </div>
        <!-- <div class="card col-md-4 mx-2">
        <div class="card-header">            
            <h5 class="card-title mb-2">Service Disease Description Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-disease-content"> Add disease description </button>
          </div>
        </div> -->
        </div>
        <!-- slider data table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Primary care section DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="primary-care-table" class="table table-bordered table-striped">
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
                        $section = 'primary-care';
                        $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            echo '<tr>
                                    <td>'.$slno.'</td>
                                    <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                                    <td>'.$row['page_heading'].'</td>
                                    <td>'.$row['page_content_small'].'</td>
                                    <td><button type="button" class="btn btn-primary pc-edit" id="'.$row['id'].'">Edit</button></td>
                                    <td><button type="button" class="btn btn-danger pc-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
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
                <h3 class="card-title">Disease section DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="disease-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Disease</th>
                    <th>Link</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php

                        $status = 1;
                        $sql = "SELECT * FROM primary_disease where status= '$status' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){

                            echo '<tr>
                                    <td>'.$slno.'</td>
                                    <td>'.$row['disease_name'].'</td>
                                    <td>'.$row['link_id'].'</td>
                                    <td style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4;  line-clamp: 4;-webkit-box-orient: vertical;">'.$row['long_desc'].'</td>
                                    <td><button type="button" class="btn btn-primary disease-edit" id="'.$row['id'].'">Edit</button></td>
                                    <td><button type="button" class="btn btn-danger disease-delete" id="d'.$row['id'].'">Delete</button></td>
                                </tr>';

                            $slno++;
                        }
                      ?>
                    <!-- ./tbl content -->
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

<!-- modal home screen -->
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Primary Care section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=service-primary-care" enctype="multipart/form-data">
                 <input type="hidden" name="s-hidId" id="s-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="pc-heading">Enter heading</label>
                    <input type="text" name="pc-heading" class="form-control" id="pc-heading" placeholder="Enter Heading" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6character long">
                  </div>
                  <div class="form-group">
                    <label for="pc-content">Enter content</label>
                    <input type="text" name="pc-content" class="form-control" id="pc-content" placeholder="Enter small content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="pc-image">Enter image (Optional)</label>
                    <input type="file" name="pc-image" class="form-control" id="pc-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-pc"></span>
                </div>
                <!-- /.card-body -->
              <!-- ./modal-content -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="service-primary-care-btn">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- modal disease screen -->
<div class="modal fade" id="modal-lg-disease">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Primary Care disease</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=service-primary-care-disease">
                 <input type="hidden" name="d-hidId" id="d-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="disease-name">Enter Disease name</label>
                    <input type="text" name="disease-name" class="form-control" id="disease-name" placeholder="Enter Disease Name" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6character long">
                  </div>
                  <div class="form-group">
                    <label for="link-id">Enter Link</label>
                    <input type="text" name="link-id" class="form-control" id="link-id" placeholder="Enter link (similar to disease-name)" required pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6character long">
                  </div>
                  <div class="form-group">
                  <label for="long_desc">Enter full Description</label>
                    <textarea  name="long_desc" class="form-control" id="long_desc" placeholder="Enter Disease full description" minlength="6" id="" cols="30" rows="10">
                    </textarea>
                  </div>
                </div>
                <!-- /.card-body -->
              <!-- ./modal-content -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="service-disease-btn">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- html editor --> 
<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<!-- <script>
      // ClassicEditor.create( document.querySelector( '#short_desc' ) );
      // 2nd text-area
      ClassicEditor.create( document.querySelector( '#long_desc' ) );
</script> -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(document).ready( function () {
    $('#primary-care-table').DataTable();
    $('#disease-table').DataTable();

    let editor;

    ClassicEditor
        .create( document.querySelector( '#long_desc' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
    
    var sid =document.getElementById('s-hidId');
    sid.value = "";
    var did =document.getElementById('d-hidId');
    sid.value = "";
 
    $('#modal-lg').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      $('#display-img-pc').html('');
    });
    $('#modal-lg-disease').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      editor.setData("");
    });


// <!-- Heading section Edit and Delete -->
$('#primary-care-table tbody').on('click', '.pc-edit', function(e){
  // main_edits = document.getElementsByClassName('pc-edit');
  // Array.from(main_edits).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
       var heading = document.getElementById('pc-heading');
       var smallContent = document.getElementById('pc-content');
       id.value = e.target.id;
       var imgs=tr.getElementsByTagName('td')[1].innerHTML;
       $("#display-img-pc").html(imgs); 
       heading.value = tr.getElementsByTagName('td')[2].innerHTML;
       smallContent.value = tr.getElementsByTagName('td')[3].innerHTML;
        $('#modal-lg').modal('toggle');

  //     });
  // });
});

$('#primary-care-table tbody').on('click', '.pc-delete', function(e){
  // main_deletes = document.getElementsByClassName('pc-delete');
  // Array.from(main_deletes).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('s-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-pc&id="+id.value;
       }

  //     });
  // });
});
// <!-- Disease section Edit and Delete -->

$("#disease-table tbody").on("click", ".disease-edit", function(e){
  //  disease_edits = document.getElementsByClassName('disease-edit');
  // Array.from(disease_edits).forEach(function(element) {
  //     element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('d-hidId');
       var disease = document.getElementById('disease-name');
       var link = document.getElementById('link-id');
       id.value = e.target.id;      
      //  alert(id.value);

       editor.setData(tr.getElementsByTagName('td')[3].innerHTML);
       disease.value = tr.getElementsByTagName('td')[1].innerHTML;
       link.value = tr.getElementsByTagName('td')[2].innerHTML;
        $('#modal-lg-disease').modal('toggle');

  //     });
  // });
});
 
$("#disease-table tbody").on("click", ".disease-delete", function(e){
  // disease_deletes = document.getElementsByClassName('disease-delete');
  // Array.from(disease_deletes).forEach(function(element) {
      // element.addEventListener('click', (e)=> {
       tr= e.target.parentNode.parentNode;
       var id =document.getElementById('d-hidId');
        id.value = e.target.id.substring(1,);
       if(confirm("Are you sure you want to delete this record?")){
        window.location = "./../DB_process/service_process.php?oper=delete-disease&id="+id.value;
       }

  //     });
  // });
});
   
});
</script>

</body>
</html>
