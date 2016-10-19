<?php

	include("includes/dbcon.php");
	$user = $_SESSION['customer_email'];							
	$select_cust = "select * from customers where customer_email = '$user'";
	$run_c = mysqli_query($con, $select_cust);	
							
	$row_c_= mysqli_fetch_array($run_c);
	$c_id = $row_c_['customer_id'];
	$c_name = $row_c_['customer_name'];
	$c_email = $row_c_['customer_email'];
	$c_pass = $row_c_['customer_password'];									
    $cu_country = $row_c_['customer_country'];
	$c_city = $row_c_['customer_city'];
	$c_address = $row_c_['customer_address'];
	$c_contact = $row_c_['customer_contact'];	
?>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="750">
		<tr align="center">
			<td colspan="6">
				<h2>Update Your Account</h2>
			</td>
		</tr>								
		<tr>
			<td align="right">Customer Name:</td>
			<td>
				<input type="text" name="c_name" value="<?php echo $c_name; ?>" required/>
			</td>
		</tr>
		<tr>
			<td align="right">Customer Email:</td>
			<td>
				<input type="text" name="c_email" value="<?php echo $c_email; ?>" required/>
			</td>
		</tr>
		<tr>
			<td align="right">Customer Password:</td>
			<td>
				<input type="password" name="c_pass" value="<?php echo $c_pass; ?>" required/>
			</td>
		</tr>
		<tr>
			<td align="right" >Customer Country</td>
			<td>
				<select name="c_country" disabled>
					<option><?php echo $c_country; ?></option>
					<option>Europe</option>
					<option>India</option>
					<option>South Africa</option>
					<option>South America</option>										
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Customer City:</td>
			<td>
				<input type="text" name="c_city" value="<?php echo $c_city; ?>" required/>
			</td>
		</tr>
		<tr>
			<td align="right">Customer Address:</td>
			<td>
				<input type="text" name="c_address" value="<?php echo $c_address; ?>" required/>
			</td>
		</tr>
		<tr>
			<td align="right">Customer Contact:</td>
			<td>
				<input type="text" name="c_contact" value="<?php echo $c_contact; ?>" required/>
			</td>
		</tr>
		<tr  align="center">								
			<td colspan="6">
				<input type="submit" name="update" value="Update Account"/>
			</td>
		</tr>
	</table>
</form>

<?php 
	if(isset($_POST['update'])){		
		
		$customer_id = $c_id;
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];		
		$c_city = $_POST['c_city'];
		$c_address = $_POST['c_address'];
		$c_contact = $_POST['c_contact'];
		
		echo $update_c = "update customers set customer_name='$c_name',customer_email='$c_email',customer_password='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$customer_id'";
		$run_update_c = mysqli_query($con, $update_c);
							
		if($run_update_c){			
			echo "<script>alert('Updated Sucessfully')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}
	}
?>