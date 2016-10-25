<?php
	session_start();
	include("includes/dbcon.php");	

?>
<!DOCTYPE>
<html>
	<head>
		<title>Admin Pannel</title>
		<link rel="stylesheet" href="styles/login_style.css" media="all" />
	</head>
	<body>
		<div class="login-page">
			<div class="form">
				<h1>Admin Login</h1>				
				<form class="login-form" method="post">
					<input type="text" name="email" placeholder="username"/>
					<input type="password" name="password" placeholder="password"/>
					<button type="submit" name="login">login</button>					
				</form>
			</div>
		</div>
	</body>
</html>
<?php	
	if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		$select_user = "select * from admins where user_email = '$email' AND user_password = '$password'";
		$run_select_user = mysqli_query($con, $select_user);
		
		$check_user = mysqli_num_rows($run_select_user);
		
		if($check_user==0){
			echo "<script>window.alert('Incorret Details Entered')</script>";
		}else{
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('index.php?logged_in=Sucessfully Logged In','_self')</script>";
		}
	}
?>