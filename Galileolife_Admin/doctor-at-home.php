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
                <a href="./doctor-at-home.php" class="nav-link active">
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
            <h1 class="m-0">Service Page/Doctor at home</h1>
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
        <div class="card col-md-3 mx-1">
        <div class="card-header">            
            <h5 class="card-title mb-2">Header Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-header" disabled> Add Content </button>
          </div>
        </div>
        <div class="card col-md-3 mx-1">
        <div class="card-header">            
            <h5 class="card-title mb-2">Modal Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-modal"> Add Content </button>
          </div>
        </div>
        <div class="card col-md-3 mx-1">
        <div class="card-header">            
            <h5 class="card-title mb-2">Sub-content Section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-subcontent"> Add Sub Content </button>
          </div>
        </div>
        <div class="card col-md-4 mx-1">
          <div class="card-header">            
            <h5 class="card-title mb-2">Accordian section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-accordian"> Add Accordian Content </button>
          </div>
        </div>
        <div class="card col-md-4 mx-1">
          <div class="card-header">            
            <h5 class="card-title mb-2">Paragraph section</h5>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg-accordian-paragraph"> Add Paragraph Content </button>
          </div>
        </div>
        </div>
        <!-- header table -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service Header DataTable</h3>
              </div>
              <div class="card-body">
                <table id="header-table" class="table table-bordered table-striped ">
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
                    $section = 'doctor-at-home-header';
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
                <h3 class="card-title">Service modal DataTable</h3>
              </div>
              <div class="card-body">
                <table id="modal-table" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Phone no.</th>
                    <th>Email address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                          $status = 1;
                          $section = 'doctor-at-home';
                          $sql = "SELECT * FROM smart_clinic_pharmacy where status= '$status' and section='$section' order by id";
                          $result = mysqli_query($conn, $sql);
                          $slno = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <td>'.$slno.'</td>
                            <td>'.$row['phone'].'</td>
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
          <!-- sub-cont-table -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service sub section DataTable</h3>
              </div>
              <div class="card-body">
                <table id="subheader-table" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Heading</th>
                    <th>Content</th>
                    <th>More Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                    $section = 'doctor-at-home-subcontent';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<tr>
                                <td>'.$slno.'</td>
                                <td>'.$row['page_heading'].'</td>
                                <td>'.$row['page_content_small'].'</td>
                                <td>'.$row['page_content_more'].'</td>
                                <td><button type="button" class="btn btn-primary subcontent-edit" id="'.$row['id'].'">Edit</button></td>
                                <td><button type="button" class="btn btn-danger subcontent-delete" id="d'.$row['id'].'">Delete</button></td>
                            </tr>';

                        $slno++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- accordian-section -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service Accordian DataTable</h3>
              </div>
              <div class="card-body">
                <table id="accordian-table" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                    $section = 'doctor-at-home-accordian';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<tr>
                                <td>'.$slno.'</td>
                                <td><img src="../Assets/Images/'.$row['image'].'" alt="'.$row['image'].'" class="img-fluid" width="100px" height="100px"></td>
                                <td>'.$row['page_heading'].'</td>
                                <td><button type="button" class="btn btn-primary accordian-edit" id="'.$row['id'].'">Edit</button></td>
                                <td><button type="button" class="btn btn-danger accordian-delete" id="d'.$row['id'].'">Delete</button></td>
                            </tr>';

                        $slno++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- paragraph-section -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service paragraph DataTable</h3>
              </div>
              <div class="card-body">
                <table id="paragraph-table" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Paragraph Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    <!-- tbl content -->
                    <?php
                    $section = 'doctor-at-home-paragraph';
                    $sql = "SELECT * FROM service_details where page_section= '$section' order by id";
                    $result = mysqli_query($conn, $sql);
                    $slno = 1;
                    while($row = mysqli_fetch_assoc($result)){

                        echo '<tr>
                                <td>'.$slno.'</td>
                                <td>'.$row['page_content_small'].'</td>
                                <td><button type="button" class="btn btn-primary para-edit" id="'.$row['id'].'">Edit</button></td>
                                <td><button type="button" class="btn btn-danger para-delete" id="d'.$row['id'].'">Delete</button></td>
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2021-2022 <a href="https://galileolife.com/">Galileo Life</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- modal header screen -->
<div class="modal fade" id="modal-lg-header">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Doctor at home section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=doctor-at-home-header" enctype="multipart/form-data">
                <input type="hidden" name="h-hidId" id="h-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading">Main Heading</label>
                    <input type="text" name="heading" id="heading" class="form-control" placeholder="Enter heading">
                  </div>
                  <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" name="content" class="form-control" id="content" placeholder="Enter Sub-content">
                  </div>
                  <div class="form-group">
                    <label for="image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter image">
                  </div>
                  <span id="display-img"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="doctor-at-home-header-btn">Save changes</button>
            </div>            
            </form>
          </div>
        </div>
      </div>     
<!-- modal-modal screen -->
<div class="modal fade" id="modal-lg-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Doctor at home section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=doctor-at-home-modal">
                <input type="hidden" name="m-hidId" id="m-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="phone">Contact no.</label>
                    <input type="text" name="phone" id="phone" class="form-control" pattern="[0-9]{10,15}" minlength="10" title="Enter valid contact no." placeholder="Enter contact no.">
                  </div>
                  <div class="form-group">
                    <label for="email">Email id</label>
                    <input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter valid mail id" placeholder="Enter email-address">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="doctor-at-home-modal-btn">Save changes</button>
            </div>            
            </form>
          </div>
        </div>
      </div>
  <!-- modal sub content screen -->
<div class="modal fade" id="modal-lg-subcontent">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Doctor at home section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=doctor-at-home-subcontent">
                <input type="hidden" name="sc-hidId" id="sc-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sub-heading">Main Heading</label>
                    <input type="text" name="heading" id="sub-heading" class="form-control" placeholder="Enter heading">
                  </div>
                  <div class="form-group">
                    <label for="sub-content">Content</label>
                    <textarea name="content" class="form-control" id="sub-content" placeholder="Enter content" cols="30" rows="8"></textarea>
                    <!-- <input type="text" name="content" class="form-control" id="sub-content" placeholder="Enter content"> -->
                  </div>
                  <div class="form-group">
                    <label for="more-content">Content</label>
                    <textarea name="more-content" class="form-control" id="more-content" placeholder="Enter content" cols="30" rows="8"></textarea>
                    <!-- <input type="text" name="more-content" class="form-control" id="more-content" placeholder="Enter content"> -->
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="doctor-at-home-subcontent-btn">Save changes</button>
            </div>            
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- modal accordian screen -->
<div class="modal fade" id="modal-lg-accordian">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Doctor at home section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=doctor-at-home-accordian" enctype="multipart/form-data">
                <input type="hidden" name="a-hidId" id="a-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading">Main Heading</label>
                    <input type="text" name="heading" id="accordian-heading" class="form-control" placeholder="Enter heading">
                  </div>
                  <!-- <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" name="content" class="form-control" id="content" placeholder="Enter Sub-content">
                  </div> -->
                  <div class="form-group">
                    <label for="accordian-image">Enter image (Optional on update)</label>
                    <input type="file" name="image" class="form-control" id="accordian-image" placeholder="Enter image">
                  </div>
                  <span id="display-img-accordian"></span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="doctor-at-home-accordian-btn">Save changes</button>
            </div>            
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- modal accordian-paragraph screen -->
<div class="modal fade" id="modal-lg-accordian-paragraph">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Doctor at home section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <!-- form start -->
               <form id="quickForm" method="POST" action="./../DB_process/service_process.php?oper=doctor-at-home-paragraph">
                <input type="hidden" name="pa-hidId" id="pa-hidId">
                <div class="card-body">
                  <div class="form-group">
                    <label for="heading">Paragraph content</label>
                    <textarea name="content" class="form-control" id="para-content" placeholder="Enter content" cols="30" rows="10"></textarea>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="doctor-at-home-paragraph-btn">Save changes</button>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="./Assets/JS/doctor_home.js"></script>
</body>
</html>
