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
		
		$conn->close();

		header( "Location: deliverer.php?error=Successfully%20Updated%20Account" );
		exit ;
	}

	$conn->close();

	header( "Location: deliverer.php" );
	exit ;
?>
</html>
