<!DOCTYPE>
<?php
	include("includes/dbcon.php");
?>
<html>
	<head>	
		<title>Inserting Product</title>		
	</head>
	<body bgcolor="skyblue">
		<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="795" height="600" border="2" bgcolor="orange">
				<tr align="center">
					<td colspan="7"><h2>Insert Category</h2></td>
				</tr>
				<tr>
					<td align="right"><b>Category:</b></td>
					<td><input type="text" name="product_cat" size="60" required/></td>
				</tr>
				
				<tr align="center">					
					<td colspan="7"><input type="submit" name="insert_cat" value="Insert Product"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php		
	if(isset($_POST['insert_cat']))
	{				
		//getting text data		
		$cat = $_POST['product_cat'];	
		$insert_cat = "insert into categories(cat_title) values ('$cat')";
		
		$run_cat = mysqli_query($con, $insert_cat);
		
		if($run_cat)
		{
			echo "<script>alert('Category has been Inserted')</script>";
			echo "<script>window.open('index.php?insert_cat','_self')</script>";
		}
	}
?>