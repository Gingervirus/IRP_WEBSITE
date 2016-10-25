<!DOCTYPE>
<?php
	include("includes/dbcon.php");
	if(isset($_GET['edit_pro'])){
		$get_id = $_GET['edit_pro'];
		
		$get_pro = "select * from products where product_id = '$get_id'";
		$run_pro = mysqli_query($con, $get_pro);
		
		$row_pro = mysqli_fetch_array($run_pro);
		$pro_id = $row_pro['product_id'];			
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
		$pro_keywords = $row_pro['product_keywords'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
	}
?>
<html>
	<head>	
		<title>Edit Product</title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body bgcolor="skyblue">
		<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="795" height="600" border="2" bgcolor="orange">
				<tr align="center">
					<td colspan="7"><h2>Edit Product</h2></td>
				</tr>
				<tr>
					<td align="right"><b>Product Title:</b></td>
					<td><input type="text" name="product_title" value="<?php echo $pro_title; ?>" size="60" /></td>
				</tr>
				<tr>
					<td align="right"><b>Product Category:</b></td>
					<td>
						<select name="product_cat" >
							<option><?php echo $pro_cat; ?></option>
							<?php
								$get_cats = "select * from categories";
								$run_cats = mysqli_query($con, $get_cats);
		
								while ($row_cats = mysqli_fetch_array($run_cats)){
									$cat_id = $row_cats['cat_id'];
									$cat_title = $row_cats['cat_title'];
									echo "<option value='$cat_id'>$cat_title</option>";
								}
							?>
						</select>
					</td>
				</tr><tr>
					<td align="right"><b>Product Brand:</b></td>
					<td>
						<select name="product_brand" >
							<option><?php echo $pro_brand; ?></option>
							<?php
								$get_brands = "select * from brands";
								$run_brands = mysqli_query($con, $get_brands);
		
								while ($row_brands = mysqli_fetch_array($run_brands)){
									$brand_id = $row_brands['brand_id'];
									$brand_title = $row_brands['brand_title'];
									echo "<option value='$brand_id'>$brand_title</option>";
								}
							?>
						</select>
					</td>
				</tr><tr>
					<td align="right"><b>Product Image:</b></td>
					<td><input type="file" name="product_image" /><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60" /></td>
				</tr><tr>
					<td align="right"><b>Product Price:</b></td>
					<td><input type="text" name="product_price"  value="<?php echo $pro_price; ?>" /></td>
				</tr><tr>
					<td align="right"><b>Product Description:</b></td>
					<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></p></textarea></td>
				</tr><tr>
					<td align="right"><b>Product Keywords:</b></td>
					<td><input type="text" name="product_keywords"  value="<?php echo $pro_keywords; ?>" size="60" /></td>
				</tr>
				<tr align="center">					
					<td colspan="7"><input type="submit" name="update" value="Update Product"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php		
	if(isset($_POST['update']))
	{				
		//getting text data	
		$update_id = $pro_id;
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];		
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		$product_image = "";
		
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		//getting image
		
		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		
		$update_product = "update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";
		
		$run_update = mysqli_query($con, $update_product);
		
		if($run_update)
		{
			echo "<script>alert('Product has been Updated')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}
	}
?>