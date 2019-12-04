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
		<h1>Assignment</h1>
		<form method="POST" action="update_order.php">			
				<?php
					$order_id = $_POST['order_id'];
					$query = "SELECT ORDERS.order_id, order_placed_date, order_placed_time, ORDERS.delivery_time FROM ORDERS, DELIVEREDBY WHERE ORDERS.order_id = DELIVEREDBY.order_id AND is_delivered=0 AND DELIVEREDBY.deliverer_username='$username' AND ORDERS.order_id = $order_id";
					$result = $conn->query($query);
					$row = $result->fetch_assoc();
					$order_placed_date = $row['order_placed_date'];
					$order_placed_time = $row['order_placed_time'];
					$delivery_time = $row['delivery_time'];
							
					$addr_query = "SELECT * FROM GROCERYSTORE, ORDERFROM WHERE ORDERFROM.store_id=GROCERYSTORE.store_id AND ORDERFROM.order_id=$order_id";
					$addr_result = $conn->query($addr_query);
					$addr_data = $addr_result->fetch_assoc();
					$store_name = $addr_data['store_name'];
					
					$addr_query = "SELECT * FROM ORDERBY, BUYER, ADDRESS WHERE order_id=$order_id AND buyer_username = username AND address = id";
					$addr_result = $conn->query($addr_query);
					$addr_data = $addr_result->fetch_assoc();
					$street = $addr_data['street'];
					$city = $addr_data['city'];
					$state = $addr_data['state'];
					$zip = $addr_data['zip_code'];
				?>

					<input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
					<div>Order Place: <input type='text' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $order_placed_time; ?>"/></div>
					<div>Delivery Time: <input type='text' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php
					if ($delivery_time == "00:00:00") {
						echo "ASAP";
					}
					else {
						if ($delivery_time[6] != 0) {
							echo $delivery_time[6];
						}
						echo $delivery_time[7];
						if ($delivery_time[7] == 1) echo " hour";
						else echo " hours";
					}
					?>"/></div>
					<div>Status: <select name="status">
						<option value="0" default>Pending</option>
						<option value="1">Complete</option>
					</select></div>
					<div>Buyer Address: <input type='text' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $street . ", " . $city . ", " . $state . " " . $zip; ?>"/></div>
					<div>Store Name: <input type='text' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $store_name; ?>"/></div>



			<table border="1">
				<tr>
					<th>Item Name</th>
					<th>Quantity</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ITEM, SELECTITEM WHERE order_id = $order_id AND ITEM.item_id = SELECTITEM.item_id";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$item_name = $row['item_name'];
							$quantity = $row['quantity'];
				?>
				<tr>
					<td><?php echo $item_name; ?></td>
					<td><?php echo $quantity; ?></td>
				</tr>
							
				<?php
						}
					}
					$conn->close();
				?>
			</table>
					
					
			<input type="submit" value="Update Status"/>
			<input type="button" onclick="window.location.href = 'order_list.php';" value="Back"/>
		</form>

</body>
</html>
