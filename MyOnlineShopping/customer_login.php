<?php
	include("includes/dbcon.php");
?>
<div>
	<form method="post" action="">
		<table width="500" align="center" bgcolor="skyblue">
			<tr  align="center">
				<td colspan="4"><h2>Login or register to Buy!<h2></td>
			</tr>
			<tr>
				<td align="right">Email:</td>
				<td><input type="text" name="email"  placeholder="Enter Email" required/></td>
			</tr>
			<tr >
				<td align="right">Password:</td>
				<td><input type="password" name="pass" placeholder="Enter Password" required/></td>
			</tr>
			<tr align="center">
				<td colspan="4"><a href="checkout.php?forgot_pass" >Forgot Password?</a></td>
			</tr>
			<tr align="center">
				<td  colspan="4"><input type="submit" name="login" value="Login" /></td>
			</tr>
		</table>
			<h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none;">Register Here!</a><h2>
	</form>
	<?php
		if(isset($_POST['login'])){
			$c_email = $_POST['email'];
			$c_pass = $_POST['pass'];
			
			$select_c = "select * from customers where customer_password = '$c_pass' and customer_email = '$c_email'";
			$run_c = mysqli_query($con, $select_c);
			$check_c = mysqli_num_rows($run_c);
			
			if($check_c == 0){
				echo "<script>alert('Pssword or email is incorrect')</script>";
				exit();
			}
			$ip = getIp();
			$select_cart = "select * from cart where ip_add = '$ip'";
			$run_cart = mysqli_query($con, $select_cart);	
			$check_cart = mysqli_num_rows($run_cart);
			
			if($check_c > 0 AND $check_cart == 0){
				$_SESSION['customer_email'] = $c_email;
				echo "<script>alert('Login Sucessfull')</script>";
				echo "<script>window.open('customer/my_account.php','_self')</script>";
			}else{
				$_SESSION['customer_email'] = $c_email;
				echo "<script>alert('Login Sucessfull')</script>";
				echo "<script>window.open('checkout.php','_self')</script>";
			}
		}
	?>
</div>