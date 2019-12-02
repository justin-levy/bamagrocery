<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$select = "SELECT * FROM MANAGES WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$address_id = $row['store_address'];
	//echo $address_id;
	
	$select = "SELECT * FROM GROCERYSTORE WHERE address_id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $address_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$store_id = $row['store_id'];
	
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Inventory</h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Order ID</th>
					<th>Date</th>
					<th>Total Price</th>
					<th>Total Number of Items</th>
					<th>Delivery Address</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ORDERS, DELIVEREDBY, ORDERFROM WHERE ORDERS.order_id = DELIVEREDBY.order_id AND is_delivered=0 AND ORDERS.order_id=ORDERFROM.order_id AND ORDERFROM.store_id = $store_id";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$order_id = $row['order_id'];
							$order_placed_date = $row['order_placed_date'];
							
							$total_price = 0.00;
							$total_items = 0;
							
							$query2 = "SELECT SELECTITEM.quantity, listed_price FROM SELECTITEM, ITEM WHERE SELECTITEM.item_id = ITEM.item_id AND order_id=$order_id";
							$result2 = $conn->query($query2);
							if ($result2->num_rows != 0) {
								while ($row2 = $result2->fetch_assoc()) {
									$quantity = $row2['quantity'];
									$total_items = $total_items + $quantity;
									//echo $quantity;
									$listed_price = floatval( $row2['listed_price'] );
									//echo $listed_price;
									$total_price = $total_price + ($quantity * $listed_price);
								}
							}
							
				?>
				<tr>
					<td><?php echo $order_id; ?></td>
					<td><?php echo $order_placed_date; ?></td>
					<td><?php echo $total_price; ?></td>
					<td><?php echo $total_items; ?></td>
					<td><?php 
								$addr_query = "SELECT * FROM ADDRESS, BUYER, ORDERBY WHERE ORDERBY.order_id=$order_id AND ORDERBY.buyer_username=BUYER.username AND BUYER.address=ADDRESS.id";
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
				</tr>
							
				<?php
						}
					}
					echo "</table>";
					$conn->close();
				?>
			
			<input type="button" onclick="window.location.href = 'manager.php';" value="Back"/>
		</form>

</body>
</html>
