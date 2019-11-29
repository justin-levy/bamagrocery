<html>
<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_POST['username'];
	//echo $username;
	$store_id = $_POST['store'];
	//echo $store_id;
	
	$insert = "INSERT INTO MANAGES (username, store_address) VALUE (?, ?);";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("si", $username, $store_id);
	$stmt->execute();
	$conn->close();
	
	header( "Location: ../index.php" );
	exit ;
?>
</html>
