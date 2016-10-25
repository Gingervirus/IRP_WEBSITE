<?php	
	include("includes/dbcon.php");

	if(isset($_GET['delete_customer'])){
		$p_id = $_GET['delete_customer'];
		
		$delete_customer = "delete from customers where customer_id='$p_id'";
		
		$run_delete = mysqli_query($con, $delete_customer);
		
		if($run_delete)
		{
			echo "<script>alert('Customer has been Deleted')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";
		}
	}
?>