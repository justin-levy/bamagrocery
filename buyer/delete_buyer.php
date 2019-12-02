<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$insert = "SELECT username FROM BUYER JOIN (deliveredby NATURAL JOIN orderedby) ON username=buyer_username WHERE is_delivered = 0";
	$result = $conn->query($insert);
	if ($result->num_rows > 0) {
		header( "Location: buyer.php?error=Cannot%20Delete%20Buyer%20with%20Active%20Orders" );
		exit ;
	}
	
	$insert = "DELETE FROM USER WHERE username=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	
	$_SESSION['username'] = "";
	$_SESSION['order_id'] = "";

	$conn->close();

	header( "Location: ../index.php?error=Successfully%20Deleted%20Account&logout=true" );
	exit ;
?>
</html>
