<table align="center" width="795" bgcolor="orange">
	<tr>
		<td colspan="8" align="center">
			<h2>View All Categories</h2>
		</td>
	</tr>
	<tr bgcolor="orange">
		<th>Cat ID</th>
		<th>Title</th>		
		<th>Edit</th>
		<th>Delete</th>			
	</tr>
	<tr>
		<?php
			include("includes/dbcon.php");
			
			$get_cats = "select * from categories";
			$run_cats = mysqli_query($con, $get_cats);
		
			while ($row_cats = mysqli_fetch_array($run_cats)){
				$cat_id = $row_cats['cat_id'];			
				$cat_title = $row_cats['cat_title'];				
			
		
		echo "<tr bgcolor='white'>
			<td>$cat_id</td>
			<td>$cat_title</td>			
			<td><a href='index.php?edit_cat=$cat_id'>Edit</a></td>
			<td><a href='delete_cat.php?delete_cat=$cat_id'>Delete</a></td>
		</tr>";
		 } ?>
		
	</tr>	
</table>