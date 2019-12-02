<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	//$asap = $_POST['ASAP'];
	$delivery_time = $_POST['delivery_time'];
	echo strlen($delivery_time);
	echo strlen($_POST['delivery_time']);
	//$payment_name = $_POST['payments'];
	$delivery_instructions = $_POST['delivery_instructions'];
	
	echo "Checkout ";
	echo $order_id;
	echo "\n";
	
	echo " ";
	//echo $asap;
	echo " ";
	echo $delivery_time;
	echo " ";
	
	echo $delivery_instructions;
	
	// deliveredby
	// orderby
	// update orders
	
	
	//$insert = "INSERT INTO SELECTITEM (order_id, quantity, item_id) VALUE (?, ?, ?);";
	//$stmt = $conn->prepare($insert);
	//$stmt->bind_param("iii", $order_id, $quantity, $item_id);
	//$stmt->execute();
	
	$conn->close();

	//header( "Location: find_item.php" );
	//exit ;
?>