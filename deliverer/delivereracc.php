<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Assignments</h1>

		<form method="" action="">
			<table border="1">
				<tr>
					<th> Store Name</th>
					<th>Order ID</th>
					<th> Date </th>
					<th>Time Order Made</th>
					<th>Time of Delivery</th>
					<th>Order Price</th>
					<th>Total Number of Items</th>
				</tr>

				<?php
					$query = "SELECT storeid FROM orderfrom WHERE order_id = '$orderid'";
					$result = $conn->query($query);
					if()


					$query = "SELECT * FROM orders WHERE delivery_username ='$username'";

					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							//$username = $row["username"];
							$payment_name = $row["payment_name"];
							$account_number = $row["account_number"];
							$routing_number = $row["routing_number"];
				?>

				<tr>
					<td><input type="radio" name="payment" value="<?php echo $payment_name?>" <?php if ($payment_name == $default_payment_name) echo "checked"; ?> required></td>
					<td><?php echo $username; ?></td>
					<td><?php echo $payment_name; ?></td>
					<td><?php echo $account_number; ?></td>
					<td><?php echo $routing_number; ?></td>
				</tr>

				<?php
						}
					}
					else {
						header( "Location: new_payment.php?username=$username" );
						exit ;
					}
					$conn->close();
				?>
			</table>
			<input type="submit"  value="Confirm Order"/>
			<input type="button" onclick="window.location.href = '<?php echo "new_payment.php?username=$username" ?>';" value="Use Different Payment"/>
			<input type="button" onclick="window.location.href = '<?php echo "buyer.php?username=$username" ?>';" value="Back"/>
		</form>

</body>
</html>
