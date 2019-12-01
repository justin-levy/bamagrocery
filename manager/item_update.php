<html>
<?php
	$item_id = $_POST['item_id'];
	$newQuantity = $_POST['quantity'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$select = "SELECT * FROM ITEM WHERE item_id=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $item_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$quantity = $row['quantity'];
	
	if ($newQuantity != $quantity) {
		$insert = "UPDATE ITEM SET quantity=? WHERE item_id=?;";
		$stmt = $conn->prepare($insert);
		$stmt->bind_param("ii", $newQuantity, $item_id);
		$stmt->execute();
	}

	$conn->close();

	header( "Location: item_list.php" );
	exit ;
?>
</html>
