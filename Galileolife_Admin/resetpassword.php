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
      <h3 class="login-box-msg" style="color: #917cff;">Reset Password</h3>

      <form action="../DB_process/Authentication.php?oper=resetpassword" method="post" onsubmit="return verifyPassword();">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Enter new password" id="password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
          <span id="passerror" style="color:red; font-size:10px;"></span>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Re-enter new password" id="cnf_password" name="cnf_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
          <span id="cpasserror" style="color:red; font-size:10px;"></span>
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
<script>
  function verifyPassword(){

    var pass = document.getElementById("password").value();
    var cpass = document.getElementById("cnf_password").value();

    if(pass.length == ""){
      document.getElementById('passerror').innerHTML="Enter password";
      return false;
    }
    if(pass.length < 6){
      document.getElementById('passerror').innerHTML="Enter password must be of length 6";
      return false;
    }
    if(cpass.length == ""){
      document.getElementById('cpasserror').innerHTML="Enter password";
      return false;
    }
    if(cpass.length == ""){
      document.getElementById('cpasserror').innerHTML="Enter password must be of length 6";
      return false;
    }
    if(pass != cpass){
      document.getElementById('passerror').innerHTML="Both password must be same..";
      document.getElementById('cpasserror').innerHTML="Both password must be same..";
      return false;
    }
    return true;

  }
</script>
</body>
</html>
