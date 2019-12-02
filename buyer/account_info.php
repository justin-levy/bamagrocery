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
	
	$select = "SELECT * FROM BUYER WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$phone = $row['phone'];
	$addressID = $row['address'];
	$def_store_id = $row['default_store_id'];
	$default_payment_name = $row['default_payment'];
	//echo $phone;
	
	$select = "SELECT * FROM ADDRESS WHERE id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $addressID);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$buyerStreet = $row['street'];
	$buyerCity = $row['city'];
	$buyerState = $row['state'];
	$buyerZip = $row['zip_code'];
	
	$select = "SELECT * FROM GROCERYSTORE WHERE store_id=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("i", $storeID);
	$stmt->execute();
	$res = $stmt->get_result();
	if($res->row_num == 1) {
		$row = $res->fetch_assoc();
		$storeName = $row['store_name'];
		$storeAddressID = $row['address_id'];
		//echo $storeName;
		
		$select = "SELECT * FROM ADDRESS WHERE id=?;";
		$stmt = $conn->prepare($select);
		$stmt->bind_param("i", $storeAddressID);
		$stmt->execute();
		$res = $stmt->get_result();
		$row = $res->fetch_assoc();
		$storeAddress = $row['street'];
		//echo $storeAddress;
	}
	
	$select = "SELECT * FROM PAYMENTS WHERE username=? AND payment_name=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("ss", $username, $default_payment_name);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$default_payment_name = $row['payment_name'];

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Account Information</h1>

		<form method="POST" action="update_buyer.php">
			<form action='' method='post'>
			<div>Username: <input type='text' name='username' required maxlength="30" readonly value="<?php echo $username; ?>"/></div>
			<div>Email: <input type='email' name='email' required maxlength="50" value="<?php echo $email; ?>"/></div>
			<div>First Name: <input type='text' name='first_name' required maxlength="30" readonly value="<?php echo $first_name; ?>"/></div>
			<div>Last Name: <input type='text' name='last_name' required maxlength="30" readonly value="<?php echo $last_name; ?>"/></div>
			<div>Phone Number: <input type='text' name='phone' pattern="[0-9]+" required minlength=\"10\" maxlength=\"10\" value="<?php echo $phone; ?>"/></div>
			
			<div>Default Grocery Store: 
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
				?>
							<option value="<?php echo $store_id?>" <?php if ($store_id == $def_store_id) echo " selected=\"selected\""; ?>><?php echo $store_name?> - <?php 
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
				?>
			</select></div>
			<div>Default Payment: <select name="payment">
				<?php
					$query = "SELECT * FROM PAYMENTS WHERE username ='$username'";
					$result = $conn->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							//$username = $row["username"];
							$payment_name = $row["payment_name"];
							$account_number = $row["account_number"];
							$routing_number = $row["routing_number"];
				?>
							<option value="<?php echo $payment_name?>" <?php if ($payment_name == $default_payment_name) echo "checked"; ?>><?php echo $payment_name; ?> - <?php echo $account_number; ?></option>
				<?php
						}
					}
					else {
						header( "Location: new_payment.php" );
						exit ;
					}
					$conn->close();
				?>
			</select></div>
			
			<div>Street: <input type='text' name='street' pattern="[a-zA-Z0-9 ]+" required maxlength="50" value="<?php echo $buyerStreet?>"/></div>
			<div>City: <input type='text' name='city' pattern="[a-zA-Z ]+" required maxlength="20" value="<?php echo $buyerCity?>"/></div>
			<div>State: <input type='text' name='state' pattern="[a-zA-Z ]+" required maxlength="20" value="<?php echo $buyerState?>"/></div>
			<div>ZIP Code: <input type='text' name='zip_code' pattern="[0-9]+" required maxlength="5" minlength="5" value="<?php echo $buyerZip?>"/></div>
			
			<input type='submit' />
			<input type="button" onclick="window.location.href = 'delete_buyer.php';" value="Delete Buyer"/>
			<input type="button" onclick="window.location.href = 'buyer.php';" value="Back"/>
		</form>
	</body>
</html>