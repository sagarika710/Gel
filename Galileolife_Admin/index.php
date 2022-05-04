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
  <title>Galileo Life || Admin | Dashboard</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="../Assets/Images/favicon.png" type="image/x-icon">
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
          Logout<i class="fa fa-sign-out-alt"></i>
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
            <a href="./index.php" class="nav-link active">
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
            <h1 class="m-0">Home Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Home</li>
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
        <div class="card col-md-3 mx-3">
        <div class="card-header">            
            <h5 class="card-title mb-2">Home Service Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-service" disabled> Add Home Service Content </button>
          </div>
        </div>
        <div class="card col-md-3">
          <div class="card-header">            
            <h5 class="card-title mb-2">Home Benifit Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-benefits" disabled> Add Home Benifit Content </button>
          </div>
        </div>
        </div>
        <!-- slider data table -->
        <div class="row">
          <!-- home-service-section -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">HOME Service section DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="home-service-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Small Content</th>
                    <th>More Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody id="home-table-service-tbody">
                    <!-- php code -->
                    <!-- tbl content -->
                    <?php
                      $section = 'home_service';
                      $sql = "SELECT * FROM `home_details` where page_section= '$section' order by id";
                      $result = mysqli_query($conn, $sql);
                      $data = array();
                      $slno = 1;
                      while($row = mysqli_fetch_assoc($result)){

                          echo '<tr>
                                  <td>'.$slno.'</td>
                                  <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                                  <td>'.$row['page_heading'].'</td>
                                  <td>'.$row['page_content_small'].'</td>
                                  <td>'.$row['page_content_more'].'</td>
                                  <td><button type="button" class="btn btn-primary s-edit" id="'.$row['id'].'">Edit</button></td>
                                  <td><button type="button" class="btn btn-danger s-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                              </tr>';

                          $slno++;
                      }

                    ?>
                    <!-- ./TBL CONTENT -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./home-service-section -->

          <!-- home-benefits-section -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">HOME benefits section DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="home-benefit-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Small Content</th>
                    <th>More Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody id="home-table-benefits-tbody">
                      <!-- php code -->
                    <!-- tbl content -->
                    <?php
                      $section = 'home_benefits';
                      $sql = "SELECT * FROM `home_details` where page_section= '$section' order by id";
                      $result = mysqli_query($conn, $sql);
                      $data = array();
                      $slno = 1;
                      while($row = mysqli_fetch_assoc($result)){

                          echo '<tr>
                                  <td>'.$slno.'</td>
                                  <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                                  <td>'.$row['page_heading'].'</td>
                                  <td>'.$row['page_content_small'].'</td>
                                  <td>'.$row['page_content_more'].'</td>
                                  <td><button type="button" class="btn btn-primary b-edit" id="'.$row['id'].'">Edit</button></td>
                                  <td><button type="button" class="btn btn-danger b-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                              </tr>';

                          $slno++;
                      }

                    ?>
                    <!-- ./TBL CONTENT -->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./home-benefits-section -->


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
      <!-- modal service screen -->
<div class="modal fade" id="modal-lg-service">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Home Service section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/home_process.php?oper=service-store" enctype="multipart/form-data">
                 <input type="hidden" name="s-hidId" id="s-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="service-heading">Enter Service heading</label>
                    <input type="text" name="service-heading" class="form-control" id="service-heading" placeholder="Enter heading" required minlength="6" pattern="[a-zA-z0-9\s]{6,200}" title="service-heading must be 6character long">
                  </div>
                  <div class="form-group">
                    <label for="smallContent-service">Enter small content</label>
                    <input type="text" name="smallContent-service" class="form-control" id="smallContent-service" placeholder="Enter small content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="moreContent-service">Enter more content</label>
                    <input type="text" name="moreContent-service" class="form-control" id="moreContent-service" placeholder="Enter more content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="home-service-image">Enter image</label>
                    <input type="file" name="home-service-image" class="form-control" id="home-service-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-service"></span>
                </div>
                <!-- /.card-body -->
              <!-- ./modal-content -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="home-service-btn">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal service screen -->

<!-- modal benefits screen -->
<div class="modal fade" id="modal-lg-benefits">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Home benefits section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/home_process.php?oper=benefits-store" enctype="multipart/form-data">
                 <input type="hidden" name="b-hidId" id="b-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading-benefits">Enter heading</label>
                    <input type="text" name="heading-benefits" class="form-control" id="heading-benefits" placeholder="Enter Heading" required pattern="[a-zA-z0-9\s]{6,200}" title="heading must be 6 character long">
                  </div>
                  <div class="form-group">
                    <label for="smallContent-benefits">Enter small content</label>
                    <input type="text" name="smallContent-benefits" class="form-control" id="smallContent-benefits" placeholder="Enter small content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="moreContent-benefits">Enter more content</label>
                    <input type="text" name="moreContent-benefits" class="form-control" id="moreContent-benefits" placeholder="Enter more content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="home-benefits-image">Enter image (optional)</label>
                    <input type="file" name="home-benefits-image" class="form-control" id="home-benefits-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-benefit"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="home-benefits-btn">Save changes</button>
            </div>
            </form><!-- form end -->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal benefits screen -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="./Assets/JS/index.js"></script>
</body>
</html>
