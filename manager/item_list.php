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
	
		<form method="POST" action="item_view.php">			
			<table border="1">
				<tr>
					<th>Item Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Retail Price</th>
					<th>Wholesale Price</th>
					<th>Expiration Date</th>
				</tr>
				<?php					
					$query = "SELECT * FROM ITEM, soldAt WHERE ITEM.item_id = SOLDAT.item_id AND store_id='$store_id'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$item_id = $row['item_id'];
							$item_name = $row['item_name'];
							
							$exp_date = $row['exp_date'];
							$quantity = $row['quantity'];
							$listed_price = $row['listed_price'];
							$wholesale_price = $row['wholesale_price'];
							$description = $row['description'];
				?>
				<tr>
					<td><input type="radio" name="item_id" value="<?php echo $item_id?>" required><?php echo $item_name; ?></td>
					<td><?php echo $description; ?></td>
					<td><?php echo $quantity; ?></td>
					<td><?php echo $listed_price; ?></td>
					<td><?php echo $wholesale_price; ?></td>
					<td><?php echo $exp_date; ?></td>
				</tr>
							
				<?php
						}
						echo "</table><input type=\"submit\" value=\"View Item\"/>";
					}
					else echo "</table>";
					$conn->close();
				?>
			
			<input type="button" onclick="window.location.href = 'manager.php';" value="Back"/>
		</form>

</body>
</html>
