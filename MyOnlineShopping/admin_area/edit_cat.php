<!DOCTYPE>
<?php
	include("includes/dbcon.php");
	if(isset($_GET['edit_cat'])){
		$get_id = $_GET['edit_cat'];		
		$get_cat = "select * from categories where cat_id = '$get_id'";
		$run_cat = mysqli_query($con, $get_cat);
		
		$row_cat = mysqli_fetch_array($run_cat);
		$cat_id = $row_cat['cat_id'];			
		$cat_title = $row_cat['cat_title'];	
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
					<td colspan="7"><h2>Update Category</h2></td>
				</tr>
				<tr>
					<td align="right"><b>Category:</b></td>
					<td><input type="text" name="cat_title" size="60" value="<?php echo $cat_title; ?>" /></td>
				</tr>
				
				<tr align="center">					
					<td colspan="7"><input type="submit" name="update_cat" value="Update Category"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php		
	if(isset($_POST['update_cat']))
	{				
		//getting text data		
		$update_id = $cat_id;
		$cat_t = $_POST['cat_title'];
		$update = "update categories set cat_title='$cat_t' where cat_id='$update_id'";
		
		$run_cat_update = mysqli_query($con, $update);
		
		if($run_cat_update)
		{
			echo "<script>alert('Category has been Updated')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>