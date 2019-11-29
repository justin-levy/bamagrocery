<?php
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	$username = $_GET['username'];
	$query = "SELECT default_payment FROM BUYER WHERE username = '$username'";
	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$default_payment_name = $row['default_payment'];
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Payment Methods</h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Option</th>
					<th>Username</th>
					<th>Payment Name</th>
					<th>Account Number</th>
					<th>Routing Number</th>
				</tr>
				<?php
					$query = "SELECT * FROM PAYMENTS WHERE username ='$username'";
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
