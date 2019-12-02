<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$delivery_time = $_POST['delivery_time'];
	if ($delivery_time == "") {
		$delivery_time = "0";
	}

	$payment_name = $_POST['payments'];
	$delivery_instructions = $_POST['delivery_instructions'];
	
	// find random deliverer
	$insert = "SELECT * FROM USER WHERE user_type='d' ORDER BY RAND ( ) LIMIT 1";
	$result = $conn->query($insert);
	$row = $result->fetch_assoc();
	$deliverer_username = $row['username'];
	$deliverer_first = $row['first_name'];
	$deliverer_last = $row['last_name'];
	/*
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
	$insert = "UPDATE ORDERS SET order_placed_time = CURRENT_TIME WHERE order_id = ?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("i", $order_id);
	$stmt->execute();*/
	
	$insert = "UPDATE ORDERS SET order_placed_date = CURRENT_DATE WHERE order_id = ?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("i", $order_id);
	$stmt->execute();
	
	$insert = "UPDATE ORDERS SET delivery_instructions = ? WHERE order_id = ?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("si", $delivery_instructions, $order_id);
	$stmt->execute();
	
	$insert = "UPDATE ORDERS SET delivery_time = ? WHERE order_id = ?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("si", $delivery_time, $order_id);
	$stmt->execute();
	
	$insert = "SELECT * FROM ORDERS WHERE order_id = $order_id;";
	$stmt = $conn->query($insert);
	$row = $result->fetch_assoc();
	$time_placed = $row['order_placed_time'];
	
	//$_SESSION['order_id'] = "";
	$conn->close();

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Receipt</h1>

		<form method="" action="">
			<form action='' method='post'>
			<div>Order Number: <input type='text' readonly value="<?php echo $order_id; ?>"/></div>
			<div>Payment Name: <input type='text' readonly value="<?php echo $payment_name; ?>"/></div>
			<div>Deliverer's Name: <input type='text' readonly value="<?php echo $deliverer_first; echo " "; echo $deliverer_last; ?>"/></div>
			
			<div>Number of Items: <input type='text' readonly value="<?php echo $last_name; ?>"/></div>
			<div>Time Order Placed: <input type='text' readonly value="<?php echo $time_placed; ?>"/></div>
			<div>Time of Delivery: <input type='text' readonly value="<?php echo $username; ?>"/></div>
			
			<input type="button" onclick="window.location.href = '../buyer.php';" value="Home"/>
		</form>
	</body>
</html>