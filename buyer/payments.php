<?php
	session_start();
	$username = $_SESSION['username'];

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

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
					<th>Payment Name</th>
					<th>Account Number</th>
					<th>Routing Number</th>
					<th>Default</th>
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
					<td><input type="radio" name="payment" value="<?php echo $payment_name?>" <?php if ($payment_name == $default_payment_name) echo "checked"; ?> required>
					<?php echo $payment_name; ?></td>
					<td><?php echo $account_number; ?></td>
					<td><?php echo $routing_number; ?></td>
					<td><?php if ($payment_name == $default_payment_name) echo "yes"; else echo "no"; ?></td>
				</tr>
							
				<?php
						}
					}
					else {
						header( "Location: new_payment.php" );
						exit ;
					}
					$conn->close();
				?>
			</table>
			<input type="button" onclick="window.location.href = 'store/checkout.php';" value="Checkout"/>
			<input type="button" onclick="window.location.href = 'new_payment.php';" value="Use Different Payment"/>
			<input type="button" onclick="window.location.href = 'buyer.php';" value="Back"/>
		</form>

</body>
</html>
