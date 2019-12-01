<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$quantity = $_POST['quantity'];
	$item_id = $_POST['item_id'];
	
	$insert = "INSERT INTO SELECTITEM (order_id, quantity, item_id) VALUE (?, ?, ?);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("iii", $order_id, $quantity, $item_id);
	$stmt->execute();
	
	$conn->close();

	header( "Location: find_item.php" );
	exit ;
?>