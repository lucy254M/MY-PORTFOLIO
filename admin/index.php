<?php 
include("includes/db.php");
session_start();
if(!isset($_SESSION['username']))
{
  echo "<script>window.open('login.php?not_admin=Admin Login!','_self')</script>";
}
else{ 
 

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tersus Training DashBoard</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
     
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

    <style type="text/css">
                     .page_links
                      {
                       font-family: arial, verdana;
                       font-size: 12px;
                       padding: 6px;
                       margin: 3px;
                       text-decoration: none;
                       float: right;
                       background:#2A3F54;
                       color:#fff;
                      }
                      #page_a_link
                      {
                       font-family: arial, verdana;
                       font-size: 12px; 
                       padding: 6px;
                       margin: 3px;
                       text-decoration: none;
                      }
                      

        </style>


    
    
   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="" class="site_title"><span>Tersus Training Service</span></a>
            </div>

            <div class="clearfix"></div>
            <?php
          if(isset($_SESSION['username'])) {
            $getuser = "SELECT * FROM admin WHERE username='{$_SESSION['username']}'";
            $resultuser = mysqli_query($con, $getuser);

            while($row = mysqli_fetch_assoc($resultuser)) {

                $user_id=$row['id'];
                $name=$row['name']; 
                
                if ($row["user_image"]==''){
                      $userimage= 'user_images/avator.png';
                    }
                    else {
                      $userimage=$row['user_image'];
                    }
              }
              
            }
             ?>
                        

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              
                <img src="user_images/<?php echo$userimage;?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>

                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home</a></li>

                   <li><a><i class="fa fa-edit"></i> Manage Blog<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?posts">Veiw Posts</a></li>
                    </ul>
                  </li>
                  
                   <li><a><i class="fa fa-user"></i> Manage Users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    
                      <li><a href="index.php?users">View Users</a></li>
                    
                     
                    </ul>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $name ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
       

                 <?php 

                  if(isset($_GET['edit_posts'])){
                  include("edit_posts.php");
                  }else if(isset($_GET['new_post'])){
                  include("new_post.php");
                  }else{
                  include("posts.php");
                  }
                 
                 
                 ?>
            
                  </div>


                  </div>
                </div>
              </div>
              <!-- /page content -->
          <div class="pull-right">
            Admin <a href=""></a>
          </div>
        <!-- footer content -->
        <footer>
          
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>

<?php } ?>
