<?php	
	include("includes/dbcon.php");

	if(isset($_GET['delete_brand'])){
		$c_id = $_GET['delete_brand'];
		
		$delete_brand = "delete from brands where brand_id='$c_id'";
		
		$run_brand = mysqli_query($con, $delete_brand);
		
		if($run_brand){
			echo "<script>alert('Brand has been Deleted')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
	}
?>