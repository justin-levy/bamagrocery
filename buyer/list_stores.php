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
		<h1>New Order - Choose a Store</h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Store Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Hours Today</th>
				</tr>
				<?php
					$query = "SELECT * FROM GROCERYSTORE";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							//$username = $row["username"];
							$store_name = $row["store_name"];
							$address_id = $row["address_id"];
							$store_id = $row["store_id"];
							$phone = $row['phone'];
				?>
				<tr>
					<td><input type="radio" name="payment" value="<?php echo $payment_name?>" <?php if ($payment_name == $default_payment_name) echo "checked"; ?> required>
					<?php echo $store_name; ?></td>
					<td><?php 
								$addr_query = "SELECT * FROM ADDRESS WHERE id=$store_id";
								$addr_result = $conn->query($addr_query);
								$addr_data = $addr_result->fetch_assoc();
								echo $addr_data['street'];
								echo ", ";
								echo $addr_data['city'];
								echo ", ";
								echo $addr_data['state'];
								echo " ";
								echo $addr_data['zip_code'];
							?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $opening_time; echo " - "; echo $closing_time; ?></td>
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
			<input type="button" onclick="window.location.href = '<?php echo "" ?>';" value="Choose"/>
			<input type="button" onclick="window.location.href = '<?php echo "buyer.php" ?>';" value="Back"/>
		</form>

</body>
</html>
