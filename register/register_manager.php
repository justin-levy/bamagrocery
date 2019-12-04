<?php
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Register Manager Cont.</h1>
		<form action='insert_manager.php' method='post'>
			<input type="hidden" name="username" value="<?php echo $_GET['username']?>">
			<select name="store">
				<?php
					$query = "SELECT * FROM GROCERYSTORE";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							$store_id = $row["store_id"];
							$address_id = $row["address_id"];
							$store_name = $row["store_name"];
							$opening_time = $row["opening_time"];
							$closing_time = $row["closing_time"];
							$phone = $row["phone"];
				?>
							<option value="<?php echo $address_id?>"><?php echo $store_name?> - <?php
								$addr_query = "SELECT * FROM ADDRESS WHERE id=$address_id";
								$addr_result = $conn->query($addr_query);
								$addr_data = $addr_result->fetch_assoc();
								echo $addr_data['street'];
								echo ", ";
								echo $addr_data['city'];
								echo ", ";
								echo $addr_data['state'];
								echo " ";
								echo $addr_data['zip_code'];
							?></option>
				<?php
						}
					}
					$conn->close();
				?>
			</select>
			<input type='submit' />
		</form>
	</body>
</html>
