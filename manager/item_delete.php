<html>
<?php
	$item_id = $_GET['item_id'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$insert = "DELETE FROM SOLDAT WHERE item_id=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("i", $item_id);
	$stmt->execute();
	
	$insert = "DELETE FROM ITEM WHERE item_id=?;";
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("i", $item_id);
	$stmt->execute();

	$conn->close();

	header( "Location: item_list.php" );
	exit ;
?>
</html>
