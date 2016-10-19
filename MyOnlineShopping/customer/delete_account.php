<?php
	include("includes/dbcon.php");	
?>
<h2>Do you really want to delete your account?</h2>
<form action="" method="post">
		<input type="submit" name="yes" value="Yes delete my account"/>
		<input type="submit" name="no" value="No"/>
</form>

<?php 
	$user = $_SESSION['customer_email'];
	if(isset($_POST['yes'])){	
		$ip = getIp();
		$delete_cart = "delete from cart where ip_add = '$ip'";
		$run_cart_delete = mysqli_query($con, $delete_cart);
		$delete_c = "delete from customers where customer_email = '$user'";		
		$run_c_delete = mysqli_query($con, $delete_c);
		
		if($run_c_delete){
			echo "<script>alert('Updated Sucessfully')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
			include("logout.php");
		}			
		
	}
	if(isset($_POST['no'])){			
		echo "<script>window.open('index.php','_self')</script>";							
		
	}
?>