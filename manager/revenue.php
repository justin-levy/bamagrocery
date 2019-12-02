<?php
	session_start();
	$username = $_SESSION['username'];
	$item_id = $_POST['item_id'];

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
	$store_name = $row['store_name'];
	
	$select = "SELECT grocerystore.store_name, SUM(selectitem.quantity) AS quantity, SUM(item.listed_price) AS listed_price, SUM(item.wholesale_price) AS wholesale_price
	FROM (((orders NATURAL JOIN selectitem) NATURAL JOIN (SELECT item_id, listed_price, wholesale_price FROM item) AS item) NATURAL JOIN orderfrom) NATURAL JOIN (SELECT store_name, store_id FROM grocerystore) AS grocerystore
	WHERE store_id = ?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $store_id);
	$stmt->execute();
	$quantity = $row['quantity'];
	$listed_price = $row['listed_price'];
	$wholesale_price = $row['wholesale_price'];
	$profit = $listed_price - $wholesale_price;

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Item Information</h1>

		<form method="POST" action="item_update.php">
			<form action='' method='post'>
			<div>Store Name: <input type='text' name='item_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $store_name; ?>"/></div>
			<div>Number of Items Sold: <input type='number' name='quantity' required value="<?php echo $quantity; ?>"/></div>
			<div>Total Profit: <input type='number' name='quantity' required value="<?php echo $profit; ?>"/></div>

			<input type="button" onclick="window.location.href = 'manager.php';" value="Back"/>
		</form>
		</form>
	</body>
</html>