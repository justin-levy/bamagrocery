<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];

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
	
	$query = "SELECT * FROM SELECTITEM WHERE order_id=$order_id";
	$result = $conn->query($query);
	if ($result->num_rows == 0) {
		header( "Location: find_item.php" );
		exit ;
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Checkout</h1>
	
		<form method="POST" action="complete_order.php">
			<div>Payments: <select name="payments">
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
					
					<option value="<?php echo $payment_name?>" <?php if ($payment_name == $default_payment_name) echo "selected=\"selected\""; ?> required>
					<?php echo $payment_name; ?>
					</option>
							
				<?php
						}
					}
					else {
						header( "Location: new_payment.php" );
						exit ;
					}
				?>
			</select></div>
			<div><input type="checkbox" value="ASAP" checked="checked"> ASAP</div>
			<div>Delivery Time: <input value="delivery_time" type="time"/>
			</div>
			<div>Total Price: <input type='text' name='price' value="<?php
				$total_price = 0.00;
				$query = "SELECT SELECTITEM.quantity, listed_price FROM SELECTITEM, ITEM WHERE SELECTITEM.item_id = ITEM.item_id AND order_id=$order_id";
				$result = $conn->query($query);
				if ($result->num_rows != 0) {
					while ($row = $result->fetch_assoc()) {
						$quantity = $row['quantity'];
						//echo $quantity;
						$listed_price = floatval( $row['listed_price'] );
						//echo $listed_price;
						$total_price = $total_price + ($quantity * $listed_price);
					}
				}
				echo $total_price;
				
			?>"/></div>
			<div>Delivery Instructions: <input type='text' name='delivery_instructions' pattern="[a-zA-Z0-9 ]+" maxlength="200"/></div>
			<input type="submit"  value="Finalize Order"/>
			<input type="button" onclick="window.location.href = 'store_home.php';" value="Back"/>
		</form>

</body>
</html>
