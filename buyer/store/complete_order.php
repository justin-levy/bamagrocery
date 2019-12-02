<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	//$asap = $_POST['ASAP'];
	//$delivery_time = $_POST['delivery_time'];
	//echo strlen($delivery_time);
	//echo strlen($_POST['delivery_time']);
	//$payment_name = $_POST['payments'];
	//$delivery_instructions = $_POST['delivery_instructions'];
	
	echo "Checkout ";
	echo $order_id;
	
	// find random deliverer
	$insert = "SELECT * FROM USER WHERE user_type='d' ORDER BY RAND ( ) LIMIT 1";
	$result = $conn->query($insert);
	$row = $result->fetch_assoc();
	$deliverer_username = $row['username'];
	echo $deliverer_username;
	
	// deliveredby
	$insert = "INSERT INTO DELIVEREDBY (order_id, deliverer_username, delivery_time, delivery_date, is_delivered) VALUE (?, ?, NULL, NULL, 0);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("is", $order_id, $deliverer_username);
	$stmt->execute();
	
	// orderby
	$insert = "INSERT INTO ORDERBY (order_id, buyer_username) VALUE (?, ?);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("is", $order_id, $username);
	$stmt->execute();
	
	// update orders
	/*$insert = "UPDATE ORDERS SET ;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("iii", $order_id, $quantity, $item_id);
	$stmt->execute();*/
	
	$_SESSION['order_id'] = "";
	$conn->close();

	header( "Location: ../buyer.php?error=Order%20Successfully%20Added" );
	exit ;
?>