<table align="center" width="795" bgcolor="orange">
	<tr>
		<td colspan="8" align="center">
			<h2>View All Brands</h2>
		</td>
	</tr>
	<tr bgcolor="orange">
		<th>brand ID</th>
		<th>Title</th>		
		<th>Edit</th>
		<th>Delete</th>			
	</tr>
	<tr>
		<?php
			include("includes/dbcon.php");
			
			$get_brands = "select * from brands";
			$run_brands = mysqli_query($con, $get_brands);
		
			while ($row_brands = mysqli_fetch_array($run_brands)){
				$brand_id = $row_brands['brand_id'];			
				$brand_title = $row_brands['brand_title'];				
			
		
		echo "<tr bgcolor='white'>
			<td>$brand_id</td>
			<td>$brand_title</td>			
			<td><a href='index.php?edit_brand=$brand_id'>Edit</a></td>
			<td><a href='delete_brand.php?delete_brand=$brand_id'>Delete</a></td>
		</tr>";
		 } ?>
		
	</tr>	
</table>