<!DOCTYPE>
<?php 
	session_start();
	include("functions/functions.php");
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
						</span>
					</div>
					
					<div id="products_box">
						<?php
							getProducts();
							getProByCat();
							getProByBrand();
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