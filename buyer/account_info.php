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
	$user_type = $row["user_type"];
	//echo $first_name;
	//echo $last_name;
	//echo $email;
	
	$select = "SELECT * FROM BUYER WHERE username=?;";
	$stmt = $conn->prepare($select);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	$phone = $row['phone'];
	$addressID = $row['address'];
	$storeID = $row['default_store_id'];
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
	//echo $buyerStreet;
	//echo $buyerCity;
	//echo $buyerState;
	//echo $buyerZip;
	
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
	$accountNum = $row['account_number'];
	$routingNum = $row['routing_number'];
	//echo $accountNum;
	//echo $routingNum;
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Account Information</h1>

		<form method="" action="">
			<form action='' method='post'>
			<div>Username: <input type='text' name='username' required maxlength="30" readonly value="<?php echo $username; ?>"/></div>
			<div>Email: <input type='email' name='email' required maxlength="50" value="<?php echo $email; ?>"/></div>
			<div>First Name: <input type='text' name='first_name' required maxlength="30" readonly value="<?php echo $first_name; ?>"/></div>
			<div>Last Name: <input type='text' name='last_name' required maxlength="30" readonly value="<?php echo $last_name; ?>"/></div>
			<div>Phone Number: <input type='text' name='phone' pattern="[0-9]+" required minlength=\"10\" maxlength=\"10\" value="<?php echo $phone; ?>"/></div>
			
			<input type='submit' />
			<input type="button" onclick="window.location.href = '<?php echo "buyer.php" ?>';" value="Back"/>
		</form>
		</form>
	</body>
</html>