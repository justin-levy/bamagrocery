<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	$newEmail = $_POST['email'];
	$newPhone = $_POST['phone'];
	$newStoreAddress = $_POST['store'];
	$newDefaultPayment = $_POST['payment'];
	$newStreet = $_POST['street'];
	$newCity = $_POST['city'];
	$newState = $_POST['state'];
	$newZipCode = $_POST['zip_code'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	
	// update email
	$select = "SELECT * FROM USER WHERE username=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$email = $row['email'];
	
	if ($newEmail != $email) {
		$insert = "UPDATE USER SET email=? WHERE username=?;";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newEmail, $username);
		$stmt->execute();
	}
	
	

	// update store and phone and default payment
	$select = "SELECT * FROM BUYER WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$address_id = $row['default_store_id'];
	$phone = $row['phone'];
	$default_payment = $row['default_payment'];
	$address = $row['address'];
	
	if ($newStoreAddress != $address_id) {
		$insert = "UPDATE BUYER SET default_store_id=? WHERE username=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newStoreAddress, $username);
		$stmt->execute();
	}
    if ($newPhone != $phone) {
		$insert = "UPDATE BUYER SET phone=? WHERE username=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newPhone, $username);
		$stmt->execute();
	}
	if ($newDefaultPayment != $default_payment) {
		$insert = "UPDATE BUYER SET default_payment=? WHERE username=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newDefaultPayment, $username);
		$stmt->execute();
	}
	
	
	
	
	// update address
	$select = "SELECT * FROM ADDRESS WHERE id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $address);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$street = $row['street'];
	$city = $row['city'];
	$state = $row['state'];
	$zip_code = $row['zip_code'];
	
	if ($newStreet != $street) {
		$insert = "UPDATE ADDRESS SET street=? WHERE id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("si", $newStreet, $address);
		$stmt->execute();
	}
	if ($newCity != $city) {
		$insert = "UPDATE ADDRESS SET city=? WHERE id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("si", $newCity, $address);
		$stmt->execute();
	}
	if ($newState != $state) {
		$insert = "UPDATE ADDRESS SET state=? WHERE id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("si", $newState, $address);
		$stmt->execute();
	}
	if ($newZipCode != $zip_code) {
		$insert = "UPDATE ADDRESS SET zip_code=? WHERE id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ii", $newZipCode, $address);
		$stmt->execute();
	}
	


	

	$conn->close();

	header( "Location: buyer.php?error=Successfully%20Updated%20Account" );
	exit ;
?>
</html>
