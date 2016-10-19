<!DOCTYPE>
<?php 
	session_start();
	include("functions/functions.php");
	include("includes/dbcon.php");
?>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>
	<body>
		<div class="main_wrapper">
			<div  class="header_wrapper">
				<a href="index.php"><img src="images/logo.gif" id="logo" /></a>
				<img src="images/banner.gif" id="banner" />
				
			</div>
			
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_products.php">All Products</a></li>
					<li><a href="customer/my_account.php">My Account</a></li>
					<li><a href="customer_register">Sign up</a></li>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="Home">Contact us</a></li>
				</ul>
				
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="search_item" placeholder="Search an item" />
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
			</div>
			
			<div class="content_wrapper">
				<div id="sidebar">
					<div id="sidebar_title">Catagories</div>
					<ul id="cats">
						<?php 
							getCats();
						?>
					</ul>
					<div id="sidebar_title">Brands</div>
					<ul id="cats">
						<?php 
							getBrands();							
						?>
					</ul>
				</div>
				<div id="content_area">
					<?php 
							cart();							
					?>
					<div id="shopping_cart">
						<span style="float:right;color:white;font-size:15px;padding:5px;line-height:40px;">
							<?php 
								if(isset($_SESSION['customer_email'])){
									echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>";
								}else{
									echo "<Welcome guest!>";
								}
							?>
							 <b style="color:yellow">Shopping Cart</b> - Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:yellow">Go to Cart</a>
							<?php 
								if(!isset($_SESSION['customer_email'])){
									echo "<a href='checkout.php'>Login</a>";
								}else{
									echo "<a href='logout.php'>Log out</a>";
								}
							?>
						</span></div>
					
					<form action="customer_register.php" method="post" enctype="multipart/form-data">
						<table align="center" width="750">
							<tr align="center">
								<td colspan="6"><h2>Create Account</h2></td>
							</tr>								
							<tr>
								<td align="right">Customer Name:</td>
								<td><input type="text" name="c_name" required/></td>
							</tr>
							<tr>
								<td align="right">Customer Email:</td>
								<td><input type="text" name="c_email" required/></td>
							</tr>
							<tr>
								<td align="right">Customer Password:</td>
								<td><input type="text" name="c_pass" required/></td>
							</tr>
							<tr>
								<td align="right" >Customer Country</td>
								<td>
									<select name="c_country" required>
										<option>Select a Country</option>
										<option>Europe</option>
										<option>India</option>
										<option>South Africa</option>
										<option>South America</option>										
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">Customer City:</td>
								<td><input type="text" name="c_city" required/></td>
							</tr>
							<tr>
								<td align="right">Customer Address:</td>
								<td><input type="text" name="c_address" required/></td>
							</tr>
							<tr>
								<td align="right">Customer Contact:</td>
								<td><input type="text" name="c_contact" required/></td>
							</tr>
							<tr  align="center">								
								<td colspan="6"><input type="submit" name="register" value="Register"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			
			<div id="footer" >
				<h2 style="text-align:center; padding-top:30px;">&copy; 2016 ArminWentzel.com</h2>				
			</div>
		</div>
	</body>
</html>
<?php 
	if(isset($_POST['register'])){
		$ip = getIp();
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_address = $_POST['c_address'];
		$c_contact = $_POST['c_contact'];
		
		echo $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";
		$run_insert_c = mysqli_query($con, $insert_c);
		
		$select_cart = "select * from cart where ip_add = '$ip'";
		$run_cart = mysqli_query($con, $select_cart);	
		$check_cart = mysqli_num_rows($run_cart);
		
		if($check_cart == 0){
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Registered Sucessfully')</script>";
			echo "<script>window.open('customer/my_account.php','_self')</script>";
		}else
		{
			$_SESSION['customer_email'] = $c_email;
			echo "<script>alert('Registered Sucessfully')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
?>