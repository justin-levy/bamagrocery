<?php
	session_start();
	$username = $_SESSION['username'];
	$item_id = $_POST['item_id'];

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}


	$select = "SELECT * FROM ITEM WHERE item_id=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $item_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$item_name = $row['item_name'];
	$food_group = $row['food_group'];
	$quantity = $row['quantity'];

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Add Item to Cart</h1>

		<form method="POST" action="add_to_cart.php">
			<form action='' method='post'>
			<input type="hidden" name="item_id" value="<?php echo $item_id;?>">
			<div>Item Name: <input type='text' name='item_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $item_name; ?>"/></div>
			<div>Quantity: <input type='number' name='quantity' required value="0" min="1" max="<?php echo $quantity; ?>"/></div>

			<input type='submit' value="Add Item to Cart"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=<?php echo $food_group; ?>';" value="Cancel"/>
		</form>
		</form>
	</body>
</html>