<?php
	session_start();
	$username = $_SESSION['username'];
	$store_id = $_POST['store_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	echo "Store ";
	echo $store_id;
	echo " Order ";
	
	$value = 0;
	$check = 1;
	while ($check == 1) {
		$value = $value + 1;
		$query = "SELECT * FROM ORDERFROM WHERE order_id=$value";
		$result = $conn->query($query);
		if ($result->num_rows == 0) {
			$check = 0;
		}
	}
	
	echo $value;
	
	$insert = "INSERT INTO ORDERS (order_id, delivery_instructions, delivery_time, order_placed_date, order_placed_time) VALUES (?, NULL, NULL, NULL, NULL);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("i", $value);
	//echo $insert;
	$stmt->execute();
	
	$insert = "INSERT INTO ORDERFROM (order_id, store_id) VALUES (?, ?);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("ii", $value, $store_id);
	//echo $insert;
	$stmt->execute();
	
	$_SESSION['order_id'] = $value;
	
	header( "Location: store/store_home.php" );
	exit ;
?>