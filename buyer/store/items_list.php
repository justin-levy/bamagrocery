<?php
	session_start();
	$username = $_SESSION['username'];
	$store_id = $_SESSION['store_id'];
	$typeOfItem = $_GET['typeOfItem'];
	
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1><?php echo $typeOfItem; ?></h1>
	
		<form method="" action="">			
			<table border="1">
				<tr>
					<th>Item Name</th>
					<th>Description</th>
					<th>Expiration Date</th>
					<th>Price</th>
					<th>In Stock</th>
				</tr>
				<?php					
					$query = "SELECT item_name, description, exp_date, listed_price, quantity FROM ITEM JOIN soldAt ON item_id WHERE food_group='$typeOfItem' AND store_id='$store_id'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$item_name = $row['item_name'];
							$description = $row['description'];
							$exp_date = $row['exp_date'];
							$listed_price = $row['listed_price'];
							$quantity = $row['quantity'];
				?>
				<tr>
					<td><?php echo $item_name; ?></td>
					<td><?php echo $description; ?></td>
					<td><?php echo $exp_date; ?></td>
					<td><?php echo $listed_price; ?></td>
					<td><?php echo $quantity; ?></td>
				</tr>
							
				<?php
						}
					}
					$conn->close();
				?>
			</table>
			<input type="button" onclick="window.location.href = '<?php echo "" ?>';" value="Add to Cart"/>
			<input type="button" onclick="window.location.href = '<?php echo "" ?>';" value="Checkout"/>
			<input type="button" onclick="window.location.href = '<?php echo "" ?>';" value="Back"/>
		</form>

</body>
</html>
