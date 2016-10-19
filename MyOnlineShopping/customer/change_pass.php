<?php
	include("includes/dbcon.php");	
?>
<h2>Change Password:</h2>
<form action="" method="post">
		<b>Enter Current Password:</b>
		<input type="password" name="currrent_pass" required/><br>
		<b>Enter New Password:</b>
		<input type="password" name="new_pass"  required/><br>
		<b>Re-enter New Password:</b>
		<input type="password" name="new_pass_2"  required/><br>
		<input type="submit" name="change_pass" value="Change Password"/>
</form>

<?php 
	if(isset($_POST['change_pass'])){		
		
		$user = $_SESSION['customer_email'];
		$currrent_pass = $_POST['currrent_pass'];		
		$new_pass = $_POST['new_pass'];	
		$new_pass_2 = $_POST['new_pass_2'];	
		
		$select_pass = "select * from customers where customer_password = '$currrent_pass' and customer_email = '$user'";
		$run_pass = mysqli_query($con, $select_pass);
		$check_pass = mysqli_num_rows($run_pass);
		
		if($check_pass == 0){
			echo "<script>alert('Password is incorrect')</script>";
			exit();
		}
		if($new_pass != $new_pass_2){
			echo "<script>alert('New Passwords do not match')</script>";
			exit();
		}else{
			$update_c = "update customers set customer_password='$new_pass' where customer_email = '$user'";
			$run_update_c = mysqli_query($con, $update_c);
					
				echo "<script>alert('Updated Sucessfully')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";
			
		}			
		
	}
?>