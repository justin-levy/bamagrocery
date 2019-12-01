<?php
	session_start();
	$username = $_SESSION['username'];
	$order_id = $_SESSION['order_id'];
	
	if ($order_id != "") {
		header( "Location: store/store_home.php" );
		exit ;
	}

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
	
	$query = "SELECT default_store_id FROM BUYER WHERE username = '$username'";
	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$default_store_id = $row['default_store_id'];
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>New Order - Choose a Store</h1>
	
		<form method="POST" action="go_to_store.php">			
			<table border="1">
				<tr>
					<th>Store Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Hours Today</th>
				</tr>
				<?php
					$query = "SELECT * FROM GROCERYSTORE";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$store_id = $row["store_id"];
							$address_id = $row["address_id"];
							$store_name = $row["store_name"];
							$opening_time = $row['opening_time'];
							$closing_time = $row['closing_time'];
							$phone = $row['phone'];
				?>
				<tr>
					<td><input type="radio" name="store_id" value="<?php echo $store_id?>" <?php if ($store_id == $default_store_id) echo "checked"; ?> required>
					<?php echo $store_name; ?></td>
					<td><?php 
								$addr_query = "SELECT * FROM ADDRESS WHERE id=$store_id";
								$addr_result = $conn->query($addr_query);
								$addr_data = $addr_result->fetch_assoc();
								echo $addr_data['street'];
								echo ", ";
								echo $addr_data['city'];
								echo ", ";
								echo $addr_data['state'];
								echo " ";
								echo $addr_data['zip_code'];
							?></td>
					<td><?php echo $phone; ?></td>
					<td><?php echo $opening_time; echo " - "; echo $closing_time; ?></td>
				</tr>
							
				<?php
						}
					}
					
					$conn->close();
				?>
			</table>
			<input type="submit" value="Choose"/>
			<input type="button" onclick="window.location.href = 'buyer.php';" value="Back"/>
		</form>

</body>
</html>
