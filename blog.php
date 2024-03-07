<?php  include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="templatemo">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Samwel Nyarongi</title>
<!--
Stimulus Template
http://www.templatemo.com/tm-498-stimulus
-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/templatemo-style.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">

</head>
<div style="min-height:800px;">
<body data-spy="scroll"  data-target=".navbar-collapse" data-offset="50" >


<!-- PRE LOADER -->

<div class="preloader">
     <div class="spinner">
          <span class="spinner-rotate"></span>
     </div>
</div>


<!-- Navigation Section -->

<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
     <div class="container">

          <!-- navbar header -->
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <a href="#" class="navbar-brand">Samwel Nyarongi</a>
          </div>

          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html" class="smoothScroll">Home</a></li>
                    <li><a href="index.html" class="smoothScroll">About Me</a></li>
                    <li><a href="index.html" class="smoothScroll">Experiences</a></li>
                    <li><a href="index.html" class="smoothScroll">My Works</a></li>
                    <li><a href="index.html" class="smoothScroll">Contact</a></li>
               </ul>
          </div>

     </div>
</div>


<!-- Home Section -->
<div class="container">
     <br> <br>
<section id="home" class="parallax-section">

    <div class="container">
      <div>
             <div class="row">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Blog</li>
                    </ol>
                </div>
        </div>
<div class="row">
  <div class="col-md-9"> 
  <div class="blog-leftcolumn">


      <?php
   
        $sql="SELECT * FROM blog_posts ORDER BY postDate DESC";
        $result=mysqli_query($con, $sql);

         while ( $row= mysqli_fetch_array($result)) {

                 $postID= $row['postID'];
                 $postTitle= $row['postTitle'];
                 $postCategory= $row['postCategory'];
                 $postImage= $row['postImage'];
                 $postCont = substr($row['postCont'], 0, 250);
                 $post_of_date= $row['postDate'];
                 $postDate = date("Y-m-d",strtotime($post_of_date));

               
        echo "
 <!-- blog list -->
  <div class='blog-card'>
 <h2><a href='single-blog.php?id=$postID'>$postTitle</a></h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class='fakeimg' style='min-height:200px;'>
      <a href='single-blog.php?id=$postID'><img src='admin/blog_images/$postImage' class='image-2'></a>
   </div>
       <p class='project-description'>$postCont<a href='single-blog.php?id=$postID' style='font-weight: bold;'> &nbsp;&nbsp; Read More..</a></p>
      </div>

  <!-- blog list -->


             ";

        }


     
    ?>


    
  </div>
   <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
  </div>

  <div class="col-md-3">
  <div class="blog-rightcolumn">
    
    <div class="blog-card">
      <h3>Recent Posts</h3>
      <?php 
        
              
              $get_pro = "SELECT * FROM blog_posts ORDER BY postDate DESC";
        
              $run_pro = mysqli_query($con,$get_pro);
              while ($row_post= mysqli_fetch_array($run_pro)) {
        
                 $postID= $row_post['postID'];
                 $postImage= $row_post['postImage'];
                 $postTitle = substr($row_post['postTitle'], 0, 40);
                 $postDate= $row_post['postDate'];
                    
                    echo "
                       <ul style='list-style:none;'>                         
                           <li>
                       <div class='w-row'> 
                       
                         <div> 
                              <a href='single-blog.php?id=$postID'><img src='admin/blog_images/$postImage' alt='blog title' style='width:150px;'></a>
                         </div>
                        
                         <div> 
                         <br>
                             <p><a href='single-blog.php?id=$postID' style='text-decoration:none; color:black;'>$postTitle ..</a></p>
                             
                         </div>                         
                        </div>                                                          
                           </li>
                        </ul>
                        <hr style='border-top: 1px dotted black; margin-left:30px;'/>
                            ";
                   }

             ?>
     
    </div>
    
  </div>
  </div>
</div>

 </div>
    </section> <!--End off Home Sections-->
  </div> 
</body>
</div>
<footer style="border: 1px solid #ddd;">
  <div class="container">
    <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="wow fadeInUp footer-copyright" data-wow-delay="1.8s">
                         <h6>Copyright &copy; 2018 
                    
                    | Design: <a href="#" target="_parent">Samwel Nyarongi</a></h6>
                    </div>
        <ul class="wow fadeInUp social-icon" data-wow-delay="2s">
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-google-plus"></a></li>
                         <li><a href="#" class="fa fa-dribbble"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
               </div>
      
    </div>
  </div>
</footer>

<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>


</html>