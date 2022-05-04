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
      <h3 class="login-box-msg" style="color: #917cff; font-weight: 600;">Log In</h3>

      <form action="../DB_process/Authentication.php?oper=login" method="post">
      <!-- <form action="../DB_process/Authentication?oper=login" method="post"> -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" style="background-color:#917cff; color: #fff;" class="btn btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
      <p class="mt-3">
        <a style="color: #917cff;" href="./forgotpass.php">I forgot my password</a>
      </p>
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
