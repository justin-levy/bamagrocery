<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$payment_name = $_POST['payment_name'];
	$account_number = $_POST['account_number'];
	$routing_number = $_POST['routing_number'];
	
	$insert = "INSERT INTO PAYMENTS (username, payment_name, account_number, routing_number) VALUE (?, ?, ?, ?);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("ssii", $username, $payment_name, $account_number, $routing_number);
	$stmt->execute();

	$default_payment = $_POST['default'];
	if ($default_payment == "yes") {
		$query = "UPDATE BUYER SET default_payment = '$payment_name' WHERE username = '$username'";
		$conn->query($query);
	}
	
	$conn->close();

	header( "Location: payments.php?error=Successfully%20added%20new%20payment" );
	exit ;
?>