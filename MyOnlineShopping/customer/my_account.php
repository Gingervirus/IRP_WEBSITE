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
				<a href="../index.php"><img src="images/logo.gif" id="logo" /></a>
				<img src="images/banner.gif" id="banner" />
				
			</div>
			
			<div class="menu_bar">
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../all_products.php">All Products</a></li>
					<li><a href="../customer/my_account.php">My Account</a></li>
					<li><a href="../customer_register.php">Sign up</a></li>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact_us.php">Contact us</a></li>
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
					<div id="sidebar_title">My account</div>
					<ul id="cats">						
						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_pass">Change Password</a></li>
					    <li><a href="my_account.php?delete_account">Delete Account</a></li>
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
						</span>
					</div>
					
					<div id="products_box">
						
					<?php
						$user = $_SESSION['customer_email'];							
							$select_cust = "select * from customers where customer_email = '$user'";
							$run_c = mysqli_query($con, $select_cust);	
							
							$row_c_= mysqli_fetch_array($run_c);
								$c_name = $row_c_['customer_name'];
								$c_email = $row_c_['customer_email'];
								$c_pass = $row_c_['customer_password'];									
								$c_country = $row_c_['customer_country'];
								$c_city = $row_c_['customer_city'];
								$c_address = $row_c_['customer_address'];
								$c_contact = $row_c_['customer_contact'];								
							
							
						if(!isset($_GET['my_orders'])){
							if(!isset($_GET['edit_account'])){
								if(!isset($_GET['change_pass'])){
									if(!isset($_GET['delete_account'])){
										echo "<table align='center' width='750'>
								<tr align='center'>
									<td colspan='6'><h2>Welcome to your profile: $c_name</h2></td>
								</tr>
								<tr align='center'>
									<td align='right'>Name:</td>
									<td>$c_name</td>									
								</tr>
								<tr align='center'>
									<td  align='right'>Email:</td>
									<td>$c_email</td>									
								</tr>								
								<tr align='center'>
									<td  align='right'>Country:</td>
									<td>$c_country</td>									
								</tr>
								<tr align='center'>
									<td  align='right'>City:</td>
									<td>$c_city</td>									
								</tr>
								<tr align='center'>
									<td  align='right'>Address:</td>
									<td>$c_address</td>									
								</tr>
								<tr align='center'>
									<td  align='right'>Contact:</td>
									<td>$c_contact</td>									
								</tr></table>";
									}
								}
							}
						}
							
							
					?>
						
					<?php
						if(isset($_GET['edit_account'])){
							include("edit_account.php");
						}
						if(isset($_GET['change_pass'])){
							include("change_pass.php");
						}
						if(isset($_GET['delete_account'])){
							include("delete_account.php");
						}
					?>
					</div>
				</div>
			</div>
			
			<div id="footer" >
				<h2 style="text-align:center; padding-top:30px;">&copy; 2016 ArminWentzel.com</h2>				
			</div>
		</div>
	</body>
</html>