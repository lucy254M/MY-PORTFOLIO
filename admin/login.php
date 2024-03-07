<?php
include("includes/db.php");
session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tersus Training Service </title>

  <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
     
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <style>
  
 
    .login_wrapper {
    display: -ms-flexbox;
    padding: 30px;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    position: relative;
    max-width: 500px;
    box-shadow: 0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08), inset 0 1px 0 #829fff;
    border-radius: 4px;
    }
    
    </style>
    
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="form_login">
          <br><br><br>
          <section class="login_content">
                      <h1> Tersus Traing Service</h1>
            <form action="" method="post" enctype="multipart/form-data">
              
              <h2 style="color:red; text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
              <h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_out'];?></h2>

              <?php if (isset($_GET['loginfail'])){ ?>
        <div class="col-md-12 text-center" style='background: red; color: white; padding: 0.2em; margin-bottom: 2px;'>
          <span>LOGIN FAILED: EMAIL & PASSWORD DO NOT MATCH</span>
        </div>
         <?php } ?>

              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                 <button type="submit" name="login" class="btn btn-default submit">LOGIN </button>
              </div>
            </form>

              <div class="clearfix"></div>

              <div class="separator">
  

                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>Content Management Dashboard </p>
                </div>
              </div>
           
          </section>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php 


if(isset($_POST['login'])){

  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $sel_user= "SELECT * from admin where username='$username' AND  password='$password'";
  
  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);

   if ($check_user==0) {
   
     // Login Fail
  
     echo "<script>window.open('login.php?loginfail=You are logged in as admin!','_self')</script>";

    exit();
  }

  else{
   $_SESSION['username']=$username;

   echo "<script>window.open('index.php?login_error=You are logged in as admin!','_self')</script>";

  }

}

 ?> 
