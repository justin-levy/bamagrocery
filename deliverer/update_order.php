<html>
<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_POST['order_id'];
	//echo $order_id;
	$status = $_POST['status'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	if ($status == "1") {
		$insert = "UPDATE DELIVEREDBY SET is_delivered=1 WHERE order_id=?;";
		//echo $insert;
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("i", $order_id);
		$stmt->execute();
	
		$insert = "UPDATE DELIVEREDBY SET delivery_time = CURRENT_TIME WHERE order_id = ?;";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("i", $order_id);
		$stmt->execute();
	
		$insert = "UPDATE DELIVEREDBY SET delivery_date = CURRENT_DATE WHERE order_id = ?;";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("i", $order_id);
		$stmt->execute();
		$conn->close();

		header( "Location: deliverer.php?error=Successfully%20Updated%20Order" );
		exit ;
	}
	header( "Location: order_list.php" );
		exit ;
	
	
?>
</html>
