<table align="center" width="795" bgcolor="orange">
	<tr>
		<td colspan="8" align="center">
			<h2>View All Products</h2>
		</td>
	</tr>
	<tr bgcolor="orange">
		<th>Product ID</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>			
	</tr>
	<tr>
		<?php
			include("includes/dbcon.php");
			
			$get_pro = "select * from products";
			$run_pro = mysqli_query($con, $get_pro);
		
			while ($row_pro = mysqli_fetch_array($run_pro)){
				$pro_id = $row_pro['product_id'];			
				$pro_title = $row_pro['product_title'];
				$pro_price = $row_pro['product_price'];
				$pro_image = $row_pro['product_image'];
			
		
		echo "<tr bgcolor='white'>
			<td>$pro_id</td>
			<td>$pro_title</td>
			<td><img src='product_images/$pro_image' width='60' height='60' </td>
			<td>$pro_price</td>
			<td><a href='index.php?edit_pro=$pro_id'>Edit</a></td>
			<td><a href='delete_pro.php?delete_pro=$pro_id'>Delete</a></td>
		</tr>";
		 } ?>
		
	</tr>	
</table>