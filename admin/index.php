<?php
session_start();
include 'db_config.php';
if (isset($_POST['login'])) {
  $email=$_POST['email'];
  $password=$_POST['password'];

  if (!empty($email && $password)) {
    $checkAdmin=mysqli_query($db_connect,"SELECT * FROM admin_detail WHERE admin_email='$email' AND password='$password' ");
    if (mysqli_num_rows($checkAdmin)==0) {
      echo "<script>alert('Invalid Email/Password')</script>";
    }
    else if (mysqli_num_rows($checkAdmin)>=1) {
      while ($row=mysqli_fetch_array($checkAdmin)) {
        $_SESSION['admin_id']=$row['admin_id'];
        $_SESSION['admin_name']=$row['admin_name'];
        $_SESSION['admin_email']=$row['admin_email'];
        echo "<script>parent.location='dash_board.php'</script>";
      }
    }
  }
  else if (empty($email OR $password)) {
    echo "<script>alert('Please Enter Email and Password')</script>";
  }

  
}
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="">
  <meta name="keywords" content="">


  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form action="" method="post" name="login-form" id="login-form" class="user" >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="email" name="email" id="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-primary btn-user btn-block" name="login">Login</button>
                        <!-- <a href="dash_board.php" class="btn btn-primary btn-user btn-block">
                          
                        </a> -->
                      </div>
                    </div>  
                                        
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
