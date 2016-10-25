<!DOCTYPE>
<?php
	include("includes/dbcon.php");
?>
<html>
	<head>	
		<title>Admin Pannel</title>		
	</head>
	<body bgcolor="skyblue">
		<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="795" height="600" border="2" bgcolor="orange">
				<tr align="center">
					<td colspan="7"><h2>Insert Brand</h2></td>
				</tr>
				<tr>
					<td align="right"><b>Brand:</b></td>
					<td><input type="text" name="brand_title" size="60" required/></td>
				</tr>
				
				<tr align="center">					
					<td colspan="7"><input type="submit" name="insert_brand" value="Insert Brand"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php		
	if(isset($_POST['insert_brand']))
	{				
		//getting text data		
		$brand = $_POST['brand_title'];	
		$insert_brand = "insert into brands(brand_title) values ('$brand')";
		
		$run_brand = mysqli_query($con, $insert_brand);
		
		if($run_brand)
		{
			echo "<script>alert('Brand has been Inserted')</script>";
			echo "<script>window.open('index.php?insert_brand','_self')</script>";
		}
	}
?>