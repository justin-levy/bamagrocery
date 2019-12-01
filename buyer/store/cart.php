<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
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
		<h1>Cart</h1>
	
		<form method="POST" action="delete_from_cart.php">			
			<table border="1">
				<tr>
					<th>Item Name</th>
					<th>Description</th>
					<th>Expiration Date</th>
					<th>Price</th>
					<th>In Stock</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ITEM, SELECTITEM WHERE ITEM.item_id = SELECTITEM.item_id AND order_id=$order_id";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$item_id = $row['item_id'];
							$item_name = $row['item_name'];
							$description = $row['description'];
							$exp_date = $row['exp_date'];
							$listed_price = $row['listed_price'];
							$quantity = $row['quantity'];
				?>
				<tr>
					<td><input type="radio" name="item_id" value="<?php echo $item_id?>" required><?php echo $item_name; ?></td>
					<td><?php echo $description; ?></td>
					<td><?php echo $exp_date; ?></td>
					<td><?php echo $listed_price; ?></td>
					<td><?php echo $quantity; ?></td>
				</tr>
							
				<?php
						}
					}
					$conn->close();
				?>
			</table>
			<input type="submit" value="Delete"/>
			<input type="button" onclick="window.location.href = '';" value="Checkout"/>
			<input type="button" onclick="window.location.href = 'store_home.php';" value="Back"/>
		</form>

</body>
</html>
