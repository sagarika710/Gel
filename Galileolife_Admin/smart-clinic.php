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
      <!-- Sidebar user panel (Optional on update) -->
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
                <a href="./smart-clinic.php" class="nav-link active">
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
            <h1 class="m-0">Service Page/Smart Clinic</h1>
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
        <!-- 1st row buttons and table -->
        <div class="row mb-2">
          <div class="card col-md-3 mx-1">
            <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic Upper Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-upper" disabled> Add Content </button>
              </div>
            </div>
            <div class="card col-md-3 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic Modal Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-modal"> Add Content </button>
              </div>
            </div>
        </div>
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Smart clinic header section DataTable</h3>
                  </div>
                  <div class="card-body">
                    <table id="smartclinic-header-tbl" class="table table-bordered table-striped ">
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
                        <!-- tbl render -->
                        <?php
                        $section = 'smart-clinic-header';
                        $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                        $result = mysqli_query($conn, $sql);
                        $slno = 1;
                        while($row = mysqli_fetch_assoc($result)){
                          echo '<tr>
                          <td>'.$slno.'</td>
                          <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                          <td>'.$row['page_heading'].'</td>
                          <td>'.$row['page_content_small'].'</td>
                          <td><button type="button" class="btn btn-primary header-edit" id="'.$row['id'].'">Edit</button></td>
                          <td><button type="button" class="btn btn-danger header-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                          </tr>';
                          $slno++;
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
          <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Abount main section DataTable</h3>
                  </div>
                  <div class="card-body">
                    <table id="smart-clinic-pharmacy" class="table table-bordered table-striped ">
                      <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Pharmacy name</th>
                        <th>Address</th>
                        <th>Address link</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Mail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $status = 1;
                          $section = 'smart-clinic-pharmacy';
                          $sql = "SELECT * FROM smart_clinic_pharmacy where status= '$status' and section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td>'.$row['pharmacy_name'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['address_link'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td>'.$row['fax'].'</td>
                            <td>'.$row['mail'].'</td>
                            <td><button type="button" class="btn btn-primary modal-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger modal-delete" id="d'.$row['id'].'">Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
        <!-- ./ 1st row buttons and table -->

        <!-- 2nd row buttons and table -->
        <div class="row mb-2">
          <div class="card col-md-3 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic Sub-Header Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-subheader" disabled> Add Content </button>
              </div>
            </div>
            <div class="card col-md-3 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic Card Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-card"> Add Content </button>
              </div>
            </div> 
        </div>
        <!-- tbls -->
        <div class="row mb-2">
          <div class="col-12">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Smart clinic sub-header DataTable</h3>
                  </div>
                  <div class="card-body">
                    <table id="smart-clinic-subhead-table" class="table table-bordered table-striped ">
                      <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Heading</th>
                        <th>Small Content</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                          $status = 1;
                          $section = 'smart-clinic-sub-header';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td>'.$row['page_heading'].'</td>
                            <td>'.$row['page_content_small'].'</td>
                            <td><button type="button" class="btn btn-primary subcont-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger subcont-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          </div>
          <div class="col-12">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Smart clinic card DataTable</h3>
                  </div>
                  <div class="card-body">
                    <table id="smart-clinic-card-tbl" class="table table-bordered table-striped ">
                      <thead>
                      <tr>
                        <th>Serial No</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                          $status = 1;
                          $section = 'smart-clinic-card';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td><img src="../Assets/Icons/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                            <td>'.$row['page_heading'].'</td>
                            <td><button type="button" class="btn btn-primary card-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger card-delete" id="d'.$row['id'].'">Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          </div>
        </div>
        <!--./ 2nd row buttons and table -->

         <!-- 3rd row buttons and table -->
         <div class="row mb-2">
         <div class="card col-md-2 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic List About Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-lists" disabled> Add Content </button>
              </div>
            </div> 
            <div class="card col-md-2 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic List Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-list" disabled> Add Content </button>
              </div>
            </div>
         </div>
         <!-- tbls -->
         <div class="row mb-2">
           <div class="col-12">
           <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Smartclinic List About DataTable</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="smart-clinic-listscont-tbl" class="table table-bordered table-striped ">
                    <thead>
                    <tr>
                      <th>Serial No</th>
                      <th>Image</th>
                      <th>Heading</th>
                      <th>Small Content</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                      <!-- tbl content -->
                      <?php
                          $status = 1;
                          $section = 'smart-clinic-lists-section';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                            <td>'.$row['page_heading'].'</td>
                            <td>'.$row['page_content_small'].'</td>
                            <td><button type="button" class="btn btn-primary desc-list-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger desc-list-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
           </div>
           <div class="col-12">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Smartclinic List DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="smart-clinic-list-tbl" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Small Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                          $status = 1;
                          $section = 'smart-clinic-list';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td>'.$row['page_heading'].'</td>
                            <td><button type="button" class="btn btn-primary list-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger list-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
         </div>
        <!--./ 3rd row buttons and table -->

         <!-- 4th row buttons and table -->
         <div class="row mb-2">
         <div class="card col-md-2 mx-1">
              <div class="card-header">            
                <h5 class="card-title mb-2">Smartclinic Lower Section</h5>
              </div>
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-footer" disabled> Add Content </button>
              </div>
            </div> 
         </div>
         <div class="row mb-2">
           <div class="col-12">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Smartclinic Lower section DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="smart-clinic-footer-tbl" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Small Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                          $status = 1;
                          $section = 'smart-clinic-footer';
                          $sql = "SELECT * FROM service_details where status= '$status' and page_section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                            <td>'.$row['page_heading'].'</td>
                            <td>'.$row['page_content_small'].'</td>
                            <td><button type="button" class="btn btn-primary footer-edit" id="'.$row['id'].'">Edit</button></td>
                            <td><button type="button" class="btn btn-danger footer-delete" id="d'.$row['id'].'" disabled>Delete</button></td>
                            </tr>';
                            $slno++;
                         }

                        ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
         </div>
        <!--./ 4th row buttons and table -->

        
        </div>
      </div>
  </div><!-- /.container-fluid -->


  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2021-2022 <a href="https://galileolife.com/">Galileo Life</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- *********************************************************************Modals************************************************************************* -->
  <!-- header section -->
  <div class="modal fade" id="modal-lg-upper">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Header Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-header" enctype="multipart/form-data">
                 <input type="hidden" name="h-hidId" id="h-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading">Enter heading</label>
                    <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6 character long">
                  </div>
                  <div class="form-group">
                    <label for="content">Enter small content</label>
                    <input type="text" name="content" class="form-control" id="content" placeholder="Enter content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image">
                  </div>
                  <span id="display-img-sch"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-header-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- modal screen -->
  <div class="modal fade" id="modal-lg-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Modal Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-modal">
                 <input type="hidden" name="m-hidId" id="m-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="pharmacy_name">Pharmacy name</label>
                    <input type="text" name="pharmacy_name" class="form-control" id="pharmacy_name" placeholder="Enter pharmacy name" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6 character long">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="address_link">Address link</label>
                    <input type="text" name="address_link" class="form-control" id="address_link" placeholder="Enter Address map link">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone no" required minlength="10" pattern="[0-9]{10,15}" title="Enter valid phone no.">
                  </div>
                  <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" name="fax" class="form-control" id="fax" placeholder="Enter fax no." required minlength="10" pattern="[0-9]{10,30}" title="Enter valid fax no.">
                  </div>
                  <div class="form-group">
                    <label for="email">Mail id</label>
                    <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Enter email">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-modal-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- sub-section screen -->
  <div class="modal fade" id="modal-lg-subheader">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Modal Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-subsection-head">
                 <input type="hidden" name="sh-hidId" id="sh-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sub-heading">Heading</label>
                    <input type="text" name="heading" class="form-control" id="sub-heading" placeholder="Enter Header" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,200}"  title="heading must be 6 character long">
                  </div>
                  <div class="form-group">
                    <label for="sub-content">Content</label>
                    <input type="text" name="content" class="form-control" id="sub-content" placeholder="Enter description" required minlength="6" pattern="[0-9A-Za-z\s\W+]{6,10000}"  title="heading must be 6 character long">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-subsection-head-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- card section -->
  <div class="modal fade" id="modal-lg-card">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Header Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-card" enctype="multipart/form-data">
                 <input type="hidden" name="c-hidId" id="c-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="card-content">Enter small content</label>
                    <input type="text" name="content" class="form-control" id="card-content" placeholder="Enter content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="card-image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="card-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-card"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-card-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- Lists about section -->
  <div class="modal fade" id="modal-lg-lists">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Header Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-lists" enctype="multipart/form-data">
                 <input type="hidden" name="ls-hidId" id="ls-hidId">
                <div class="card-body">
                <div class="form-group">
                    <label for="lists-heading">Enter Heading</label>
                    <input type="text" name="heading" class="form-control" id="lists-heading" placeholder="Enter Heading" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="lists-content">Enter small content</label>
                    <input type="text" name="content" class="form-control" id="lists-content" placeholder="Enter content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="lists-image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="lists-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-lists"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-lists-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- LIsts section -->
  <div class="modal fade" id="modal-lg-list">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Header Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-list">
                 <input type="hidden" name="l-hidId" id="l-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="list-content">Enter content</label>
                    <input type="text" name="content" class="form-control" id="list-content" placeholder="Enter content" required minlength="6">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-list-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <!-- footer section -->
  <div class="modal fade" id="modal-lg-footer">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Smart Clinic Header Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=smartclinic-footer" enctype="multipart/form-data">
                 <input type="hidden" name="f-hidId" id="f-hidId">
                <div class="card-body">
                <div class="form-group">
                    <label for="footer-heading">Enter Heading</label>
                    <input type="text" name="heading" class="form-control" id="footer-heading" placeholder="Enter Heading" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="footer-content">Enter small content</label>
                    <input type="text" name="content" class="form-control" id="footer-content" placeholder="Enter content" required minlength="6">
                  </div>
                  <div class="form-group">
                    <label for="footer-image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="footer-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-footer"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="smartclinic-footer-btn">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<!-- *********************************************************************Modals************************************************************************* -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="./Assets/JS/smart-clinic.js"></script>
</body>
</html>
