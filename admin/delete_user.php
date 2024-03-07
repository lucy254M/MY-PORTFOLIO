<?php 

include ("includes/db.php");
if(isset($_GET['delete_user'])){
	$delete_id=$_GET['delete_user'];
	$delete_cat= "DELETE from admin where id='$delete_id'";
	$run_delete=mysqlI_query($con, $delete_cat);
	if ($run_delete) {
		echo "<script>alert('A User has been deleted!')</script>";
		echo "<script>window.open('index.php?users','_self')</script>";
		
	}
}


 ?>