<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Assignments</h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Store Name</th>
					<th>Order ID</th>
					<th>Date</th>
					<th>Time Order Made</th>
					<th>Time of Delivery</th>
					<th>Order Price</th>
					<th>Total Number of Items</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ORDERS, DELIVEREDBY WHERE ORDERS.order_id = DELIVEREDBY.order_id AND is_delivered=0 AND DELIVEREDBY.deliverer_username='$username'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$order_id = $row['order_id'];
							$order_placed_date = $row['order_placed_date'];
							//echo strlen($order_placed_date);
							$order_placed_time = $row['order_placed_time'];
							$delivery_time = $row['delivery_time'];
							//echo strlen($delivery_time);
							
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
					<td><?php 
								$addr_query = "SELECT * FROM GROCERYSTORE, ORDERFROM WHERE ORDERFROM.store_id=GROCERYSTORE.store_id AND ORDERFROM.order_id=$order_id";
								$addr_result = $conn->query($addr_query);
								$addr_data = $addr_result->fetch_assoc();
								echo $addr_data['store_name'];
							?></td>
					<td><?php echo $order_id; ?></td>
					<td><?php echo $order_placed_date; ?></td>
					<td><?php echo $order_placed_time; ?></td>
					<td><?php echo $delivery_time; ?></td>
					<td><?php echo $total_price; ?></td>
					<td><?php echo $total_items; ?></td>
				</tr>
							
				<?php
						}
					}
					echo "</table>";
					$conn->close();
				?>
			
			<input type="button" onclick="window.location.href = 'deliverer.php';" value="Back"/>
		</form>

</body>
</html>
