<?php	
	include("includes/dbcon.php");

	if(isset($_GET['delete_pro'])){
		$p_id = $_GET['delete_pro'];
		
		$delete_product = "delete from products where product_id='$p_id'";
		
		$run_delete = mysqli_query($con, $delete_product);
		
		if($run_delete)
		{
			echo "<script>alert('Product has been Deleted')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
?>