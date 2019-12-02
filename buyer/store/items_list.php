<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	$typeOfItem = $_GET['food_group'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$select = "SELECT * FROM ORDERFROM WHERE order_id=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $order_id);
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
		<h1><?php echo $typeOfItem; ?></h1>
	
		<form method="POST" action="item_quantity.php">			
			<table border="1">
				<tr>
					<th>Item Name</th>
					<th>Description</th>
					<th>Expiration Date</th>
					<th>Price</th>
					<th>In Stock</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ITEM, SOLDAT WHERE food_group='$typeOfItem' AND store_id='$store_id' AND ITEM.item_id = SOLDAT.item_id";
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
			<input type="submit" value="Add to Cart"/>
			<input type="button" onclick="window.location.href = 'checkout.php';" value="Checkout"/>
			<input type="button" onclick="window.location.href = 'find_item.php';" value="Back"/>
		</form>

</body>
</html>
