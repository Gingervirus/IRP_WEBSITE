<?php	
	include("includes/dbcon.php");

	if(isset($_GET['delete_cat'])){
		$c_id = $_GET['delete_cat'];
		
		$delete_cat = "delete from categories where cat_id='$c_id'";
		
		$run_delete = mysqli_query($con, $delete_cat);
		
		if($run_delete)
		{
			echo "<script>alert('Category has been Deleted')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>