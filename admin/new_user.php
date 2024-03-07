 <!-- /top navigation -->
 
       
              <div class="right_col" role="main">
                <div class="">

                  <div class="page-title">
                    <div class="title_left">
                      <h3>Add User</h3>
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
      


        <div class="container">


 <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2 style='color:green; text-align:center;'><?php echo @$_GET['new_user'];?></h2>
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



<?php 
      if (isset($_POST['submit'])) 
      {

        //getting the text data from the fields
        
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

       
        //getting the image from the field

        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_tmp,"user_images/$user_image");
        
  
               if(empty($name) || empty($username) || empty($password) || empty($email)) {
         
                                  if(empty($name)) {
                                      echo "<font color='red'> Name field is empty.</font><br/>";
                                  }
                                  
                                  if(empty($username)) {
                                      echo "<font color='red'>Username field is empty.</font><br/>";
                                      
                                  }
                                  
                                  if(empty($password)) {
                                      echo "<font color='red'>Password field is empty.</font><br/>";
                                  }
                  
                  if(empty($email)) {
                                      echo "<font color='red'>Email field is empty.</font><br/>";
                                  }

                              }else{
  

                $insert_product = "INSERT into admin(name,username,password,email,user_image) 
                 values ('$name','$username','$password','$email','$user_image')";
                 $insert_pro=mysqli_query($con, $insert_product);
                 if ($insert_pro) {

                                 echo "<script>window.open('index.php?new_user=User Successfully added!','_self')</script>";      
                                }else {
        
                                  
                                  echo "<script>window.open('index.php?new_user=Sorry there was an error sending your message. Please try again!','_self')</script>";
                                }
            }
            }


 ?>
                        
     
                            <form action="" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                              <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                  </label>

                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="name" type="text">
                                  </div>
                                </div>

                                <div class="item form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                                  </label>

                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="username" type="text">
                                  </div>
                                </div>

                                

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Password <span class="required">*</span>
                              </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  data-validate-words="1" name="password" type="text">
                                </div>

                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Image Image <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="user_image" size="50" />
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Email <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="website" name="email"  class="form-control col-md-7 col-xs-12">
                              </div>
                             </div>



                                <div class="ln_solid"></div>
                                <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                     <input type="submit" name="submit" class="btn btn-primary" value="Submit"> 

                                  </div>
                                </div>
                              </form>
                        </div>
                      </div>
                    </div>




                    