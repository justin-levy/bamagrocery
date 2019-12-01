<?php
	session_start();
	$username = $_SESSION['username'];

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}


	$select = "SELECT * FROM USER WHERE username=?";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	//$user_type = $row["user_type"];
	//echo $first_name;
	//echo $last_name;
	//echo $email;
	
	$select = "SELECT * FROM MANAGES WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$address_id = $row['store_address'];
	//echo $address_id;
	
	$select = "SELECT * FROM ADDRESS WHERE id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $address_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$store_address = $row['street'];
	//echo $store_address;
	
	$select = "SELECT * FROM GROCERYSTORE WHERE address_id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $address_id);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$def_store_id = $row['store_id'];
	$store_name = $row['store_name'];
	$phone = $row['phone'];
	//echo $phone;

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Manager Account Information</h1>

		<form method="POST" action="update_manager.php">
			<form action='' method='post'>
			<div>Username: <input type='text' name='username' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $username; ?>"/></div>
			<div>First Name: <input type='text' name='first_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $first_name; ?>"/></div>
			<div>Last Name: <input type='text' name='last_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $last_name; ?>"/></div>
			
			<div>Email: <input type='text' name='email' required maxlength="50" value="<?php echo $email; ?>"/></div>
			<div>Phone Number: <input type='text' name='phone' required minlength=\"10\" maxlength=\"10\" value="<?php echo $phone; ?>"/></div>
			
			<div>Managed Grocery Store: 
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
							<option value="<?php echo $address_id?>" <?php if ($store_id == $def_store_id) echo " selected=\"selected\""; ?>><?php echo $store_name?> - <?php 
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
							?></option>
				<?php
						}
					}
					$conn->close();
				?>
			</select></div>
			<input type='submit' />
			<input type='button' onclick="window.location.href = 'delete_manager.php';" value="Delete"/>
			<input type="button" onclick="window.location.href = '<?php echo "manager.php" ?>';" value="Back"/>
		</form>
		</form>
	</body>
</html>