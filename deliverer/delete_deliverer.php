<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$select = "SELECT * FROM DELIVEREDBY WHERE deliverer_username=? AND is_delivered=0";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	if ($res->num_rows != 0) {
		$conn->close();
		header( "Location: deliverer.php?error=Cannot%20Delete%20Account%20With%20Outstanidng%20Deliveries" );
		exit ;
	}
	echo $res->row_nums;
	
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
