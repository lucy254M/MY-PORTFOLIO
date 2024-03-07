
                     <?php 


                          if (isset($_GET['edit_user'])) {

                            $get_id = $_GET['edit_user'];
                            $get_user = "SELECT * from admin where id='$get_id'";
                            $run_user = mysqli_query($con, $get_user);
                            $i=0;

                            while($row_user=mysqli_fetch_array($run_user)){


                              $u_id=$row_user['id'];
                              $u_name=$row_user['name'];
                              $u_username=$row_user['username'];
                              $u_password=$row_user['password'];
                              $u_email=$row_user['email'];
                              $u_user_image=$row_user['user_image'];                    

                            }
                            
                          }
                   ?>




       
              <div class="right_col" role="main">
                <div class="">

                  <div class="page-title">
                    <div class="title_left">
                      <h3>Pages</h3>
                    </div>

                    <div class="title_right">
                      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>

 <!-- page content -->
                                     
<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Add New category</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
                              <ul class="dropdown-menu" role="menu">

                              </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>


                        <div class="x_content">
                         
                            <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">


                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Name<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="name" type="text" value="<?php echo $u_name; ?>">
                              </div>
                            </div>


                             <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Username<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="username" type="text" value="<?php echo $u_username; ?>">
                              </div>
                            </div>

                             <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Password<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="password" type="text" value="<?php echo $u_password; ?>">
                              </div>
                            </div>


                             <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Email<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">

                                <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="email" type="text" value="<?php echo $u_email; ?>">
                              </div>
                            </div>



                            

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">User Image <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                <input type="file" name="image"/><img src="user_images/<?php echo $u_user_image;?>" width="60" height="60"/>
                              </div>
                            </div>

                            <div class="item form-group">
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                     <input type="submit" class="btn btn-primary" name="submit" value="Update"> 

                                  </div>
                                </div>
                              </form>
                        </div>
                      </div>
                    </div>

<?php 


if (isset($_POST['submit'])) {

  //getting the text data from the fields

  $U_name = addslashes($_POST['name']);
  $U_username = addslashes($_POST['username']);
  $U_password = addslashes($_POST['password']);
  $U_email = addslashes($_POST['email']);



  $U_user_image=$_FILES['image']['name'];
  $U_user_image_tmp=$_FILES['image']['tmp_name'];

  move_uploaded_file($U_user_image_tmp,"user_images/$U_user_image");





  $update_user = "UPDATE admin SET name='$U_name',username='$U_username',password='$U_password',email='$U_email',user_image='$U_user_image' where id='$get_id'";
    
    $run_update=mysqli_query($con, $update_user);
   if ($run_update) {
    echo "<script>alert('User has been updated!')</script>";
    echo "<script>window.open('index.php?users','_self')</script>";
    
  }
}



 ?>

 <!-- page content -->               
                  </div>


                  </div>
                </div>
              </div>
              <!-- /page content -->


   

