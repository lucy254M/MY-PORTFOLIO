<?php 

include ("includes/db.php");
if(isset($_GET['delete_post'])){
	$delete_id=$_GET['delete_post'];
	$delete_cat= "DELETE from blog_posts where postID='$delete_id'";
	$run_delete=mysqli_query($con, $delete_cat);
	if ($run_delete) 
	{
		echo "<script>alert('Post has been successfully deleted!')</script>";
		echo "<script>window.open('index.php?services','_self')</script>";		
	}
}

 ?>