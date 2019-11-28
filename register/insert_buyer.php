<html>
<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_GET['username'];
	echo $username;
	$address_id = $_GET['address_id'];
	echo $address_id;
	$phone = $_GET['phone'];
	echo $phone;

	$insert = "INSERT INTO BUYER (username, address, phone, default_store_id, default_payment) VALUES (?, ?, ?, NULL, NULL);";
	echo $insert;

	$stmt = $conn->prepare($insert);
	$stmt->bind_param("sis", $username, $address_id, $phone);
	//echo $insert;
	$stmt->execute();

	$conn->close();

	header( "Location: ../index.php" );
	exit ;
?>
</html>
