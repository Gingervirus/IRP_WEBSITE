<table align="center" width="795" bgcolor="orange">
	<tr>
		<td colspan="8" align="center">
			<h2>View All Customers</h2>
		</td>
	</tr>
	<tr bgcolor="orange">
		<th>Customer ID</th>		
		<th>Customer Name</th>
		<th>Customer Email</th>		
		<th>Customer Country</th>	
		<th>Customer Contact</th>	
		<th>Delete</th>			
	</tr>
	<tr>
		<?php
			include("includes/dbcon.php");
			
			$get_customer = "select * from customers";
			$run_customer = mysqli_query($con, $get_customer);
		
			while ($row_customer = mysqli_fetch_array($run_customer)){
				$customer_id = $row_customer['customer_id'];			
				$customer_ip = $row_customer['customer_ip'];
				$customer_name = $row_customer['customer_name'];
				$customer_email = $row_customer['customer_email'];
				$customer_password = $row_customer['customer_password'];			
				$customer_country = $row_customer['customer_country'];
				$customer_city = $row_customer['customer_city'];
				$customer_contact = $row_customer['customer_contact'];
				$customer_address = $row_customer['customer_address'];
			
		
		echo "<tr bgcolor='white'>
			<td>$customer_id</td>		
			<td>$customer_name</td>
			<td>$customer_email</td>		
			<td>$customer_country</td>
			<td>$customer_contact</td>			
			<td><a href='delete_customer.php?delete_customer=$customer_id'>Delete</a></td>
		</tr>";
		 } ?>
		
	</tr>	
</table>