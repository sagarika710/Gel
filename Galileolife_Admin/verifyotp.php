<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon -->
  <link rel="shortcut icon" href="../Assets/Images/favicon.png" type="image/x-icon">
  <title>Galileo Life || Login</title>

  <link rel="shortcut icon" href="../Assets/Images/favicon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">

        <picture>
          <source media="(max-width: 400px)" srcset="../Assets/Images/favicon.png">
          <source media="(min-width: 401px)" srcset="../Assets/Images/logo.png">
          <img src="../Assets/Images/logo.png" alt="img" height="70px" width="auto">
        </picture>
      </a>
    </div>
    <div class="card-body">
      <h3 class="login-box-msg" style="color: #917cff;">Enter the OTP</h3>

      <form action="../DB_process/Authentication.php?oper=verifyotp" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter the OTP" name="otp" minlength="6" maxlength="6" pattern="[0-9]{6}" title="OTP must be 6 digit">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-keyboard"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" style="background-color:#917cff; color: #fff;" class="btn btn-block">Verify OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>
</html>
