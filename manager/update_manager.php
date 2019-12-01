<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	//echo $username;
	$newEmail = $_POST['email'];
	//echo $newEmail;
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$select = "SELECT * FROM USER WHERE username=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	//$first_name = $row['first_name'];
	//$last_name = $row['last_name'];
	$email = $row['email'];
	//echo $email;
	
	if ($newEmail != $email) {
		$insert = "UPDATE USER SET email=? WHERE username=?;";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newEmail, $username);
		$stmt->execute();
	}
	
	$newStoreAddress = $_POST['store'];
	$select = "SELECT * FROM MANAGES WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$address_id = $row['store_address'];
	
	if ($newStoreAddress != $address_id) {
		$insert = "UPDATE MANAGES SET store_address=? WHERE username=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ss", $newStoreAddress, $username);
		$stmt->execute();
	}

	
	
	$newPhone = $_POST['phone'];
	$select = "SELECT * FROM GROCERYSTORE WHERE address_id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $address_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$phone = $row['phone'];
	if ($newPhone != $phone) {
		$insert = "UPDATE GROCERYSTORE SET phone=? WHERE address_id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("si", $newPhone, $address_id);
		$stmt->execute();
	}

	

	$conn->close();

	header( "Location: manager.php?error=Successfully%20Updated%20Account" );
	exit ;
?>
</html>
