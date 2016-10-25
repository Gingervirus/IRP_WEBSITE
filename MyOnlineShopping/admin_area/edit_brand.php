YPE>
<?php
	include("includes/dbcon.php");
	if(isset($_GET['edit_brand'])){
		$get_id = $_GET['edit_brand'];		
		$get_brand = "select * from brands where brand_id = '$get_id'";
		$run_brand = mysqli_query($con, $get_brand);
		
		$row_brand = mysqli_fetch_array($run_brand);
		$brand_id = $row_brand['brand_id'];			
		$brand_title = $row_brand['brand_title'];	
	}
?>
<html>
	<head>	
		<title>Admin Pannel</title>		
	</head>
	<body bgcolor="skyblue">
		<form action="" method="post" enctype="multipart/form-data">
			<table align="center" width="795" height="600" border="2" bgcolor="orange">
				<tr align="center">
					<td colspan="7"><h2>Update brandegory</h2></td>
				</tr>
				<tr>
					<td align="right"><b>brand:</b></td>
					<td><input type="text" name="brand_title" size="60" value="<?php echo $brand_title; ?>" /></td>
				</tr>
				
				<tr align="center">					
					<td colspan="7"><input type="submit" name="update_brand" value="Update brand"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php		
	if(isset($_POST['update_brand']))
	{				
		//getting text data		
		$update_id = $brand_id;
		$brand_t = $_POST['brand_title'];
		$update = "update brands set brand_title='$brand_t' where brand_id='$update_id'";
		
		$run_brand_update = mysqli_query($con, $update);
		
		if($run_brand_update)
		{
			echo "<script>alert('brandegory has been Updated')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
	}
?>