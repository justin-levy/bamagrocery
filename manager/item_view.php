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
	$quantity = $row['quantity'];

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Item Information</h1>

		<form method="POST" action="item_update.php">
			<form action='' method='post'>
			<input type="hidden" name="item_id" value="<?php echo $item_id;?>">
			<div>Item Name: <input type='text' name='item_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $item_name; ?>"/></div>
			<div>Quantity: <input type='number' name='quantity' required value="<?php echo $quantity; ?>"/></div>

			<input type='submit' value="Update Item"/>
			<input type='button' onclick="window.location.href = 'item_delete.php?item_id=<?php echo $item_id; ?>';" value="Delete Item"/>
			<input type="button" onclick="window.location.href = 'item_list.php';" value="Back"/>
		</form>
		</form>
	</body>
</html>