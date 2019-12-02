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
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Assignments</h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Store Name</th>
					<th>Order ID</th>
					<th>Date</th>
					<th>Total Price</th>
					<th>Total Number of Items</th>
					<th>Delivered</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ORDERS, ORDERBY WHERE ORDERS.order_id = ORDERBY.order_id AND ORDERBY.buyer_username='$username'";
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
					<td><?php 
								$addr_query = "SELECT * FROM GROCERYSTORE, ORDERFROM WHERE ORDERFROM.store_id=GROCERYSTORE.store_id AND ORDERFROM.order_id=$order_id";
								$addr_result = $conn->query($addr_query);
								$addr_data = $addr_result->fetch_assoc();
								echo $addr_data['store_name'];
							?></td>
					<td><?php echo $order_id; ?></td>
					<td><?php echo $order_placed_date; ?></td>
					<td><?php echo $total_price; ?></td>
					<td><?php echo $total_items; ?></td>
					<td><?php 
								$del_query = "SELECT * FROM DELIVEREDBY WHERE order_id=$order_id";
								$del_result = $conn->query($del_query);
								$del_data = $del_result->fetch_assoc();
								$delivered = $del_data['is_delivered'];
								
								if ($delivered) {
									echo "yes";
								}
								else echo "no";
							?></td>
				</tr>
							
				<?php
						}
					}
					echo "</table>";
					$conn->close();
				?>
			
			<input type="button" onclick="window.location.href = 'buyer.php';" value="Back"/>
		</form>

</body>
</html>
