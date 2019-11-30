<?php
	$conn = new mysqli("localhost:8888", "root", "root", "deliverer");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_GET['username'];
	$index = mysqli_num_rows($result);  // array size
  $orderid[$index];
	$quantity[$index];
	$storeid[$index];
  $storename[$index];
	$query = "SELECT order_id FROM deliveredby WHERE username = '$username'";
	$result = $conn->query($query);
	$value = 0; // this will change the index in the array in the following while loops


	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$orderid[$value] = $row['order_id'];  // stores the one orderid in the array

			$query = "SELECT store_id FROM orderfrom WHERE order_id = '$orderid[value]'";
			$result2 = $conn->query($query);
			if($result2->num_rows == 1){
				while($row2 = $result2->fetch_assoc()){
							$storeid[$value] = $row2['store_id'];  // stores the one storeid in the array
				}
			}

			$query = "SELECT store_name FROM grocerystore WHERE store_id = '$storeid[value]'";
			$result3 = $conn->query($query);
			if($result3->num_rows == 1){
				while($row3 = $result3->fetch_assoc()){
							$storename[$value] = $row3['store_name'];   // stores the one store name in the array
				}
			}

			$query = "SELECT quantity FROM selectitem WHERE order_id = '$orderid[value]'";
			$result4 = $conn->query($query);
			if($result4->num_rows  > 0){
				while($row4 = $result4->fetch_assoc()){
							$quantity[$value] += $row4['quantity'];  // adds all the quanitities that match the orderid
				}
			}
			$value++;
		}
	}

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Assignments</h1>

		<form method="" action="">
			<table border="1">
				<tr>
					<th> Store Name</th>
					<th>Order ID</th>
					<th> Date </th>
					<th>Time Order Made</th>
					<th>Time of Delivery</th>
					<th>Order Price</th>
					<th>Total Number of Items</th>
				</tr>

				<?
		 	 $index2 = mysqli_num_rows($result);
       for($i = 0; $i <$index; $i++){
				   $query = "SELECT item_id FROM selectitem WHERE order_id = '$orderid[value]'";
				   $result5 = $conn->query($query);
					 $index2 = mysqli_num_rows($result);
					 $itemid[$index2];
				   $value = 0;

					 $query2 = "SELECT quantity FROM selectitem WHERE order_id = '$orderid[value]'";
				   $result6 = $conn->query($query2);
					 $index3 = mysqli_num_rows($result3);


				if($result5->num_rows  > 0){
					while($row5 = $result5->fetch_assoc() && $row6 = result6->fetch_assoc()){
								$itemid[$value] = $row5["itemid"];
								$price += $row6["quantity"] * itemid[$value];
								$value++;
					}
				}
      }
					for($i = 0; $i <$index; $i++){
						$query = "SELECT * FROM orders WHERE orderid ='$orderid[$i]'";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$orderid = $row["order_id"];
								$date = $row["order_time_date"];
								$timeordermade = $row["order_time_made"];
								$deliverytime = $row["delivery_time"];
							}
					 }
				}

			else {
				header( "Location: new_payment.php?username=$username" );
				exit ;
			}
				?>

				<tr>
					<td><input type="radio" name="payment" value="<?php echo $storename?>"  required></td>
					<td><?php echo $storename; ?></td>
					<td><?php echo $orderid; ?></td>
					<td><?php echo $date; ?></td>
					<td><?php echo $timeordermade; ?></td>
					<td><?php echo $deliverytime; ?></td>
					<td><?php echo $orderprice; ?></td>
					<td><?php echo $quantity; ?></td>
				</tr>

				<?php
					$conn->close();
				?>
			</table>
			<input type="submit"  value="View Assignment Details"/>
			<input type="submit" onclick="window.location.href = '<?php echo "assignmentdetails.php?username=$username" ?>';" value="Next"/>
			<input type="submit" onclick="window.location.href = '<?php echo "delivereracc.php?username=$username" ?>';" value="Previous"/>
			<input type="button" onclick="window.location.href = '<?php echo "deliverer".php?username=$username" ?>';" value="Back"/>
		</form>

</body>
</html>
