<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$insert = "DELETE FROM MANAGES WHERE username=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	
	$insert = "DELETE FROM USER WHERE username=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	
	$_SESSION['username'] = "";

	$conn->close();

	header( "Location: ../index.php?error=Successfully%20Deleted%20Account&logout=true" );
	exit ;
?>
</html>
