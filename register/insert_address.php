<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_POST['username'];
	$user_type = $_POST['user_type'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$phone = $_POST['phone'];
	
	$query = "SELECT MAX(id) FROM ADDRESS";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$newVal = $row["MAX(id)"] + 1;
	
	$insert = "INSERT INTO ADDRESS (id, street, CITY, STATE, ZIP_CODE) VALUES (?, ?, ?, ?, ?);";
	
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("isssi", $newVal, $street, $city, $state, $zip_code);
	//echo $insert;
	$stmt->execute();
	
	$conn->close();

	header( "Location: insert_buyer.php?user_type=$user_type&username=$username&address_id=$newVal&phone=$phone" );
	exit ;
?>