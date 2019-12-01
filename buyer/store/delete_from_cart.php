<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$item_id = $_POST['item_id'];
	
	$insert = "DELETE FROM SELECTITEM WHERE order_id=? AND item_id=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("ii", $order_id, $item_id);
	$stmt->execute();
	
	$conn->close();

	header( "Location: cart.php" );
	exit ;
?>