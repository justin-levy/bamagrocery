<?php
	session_start();
	$username = $_SESSION['username'];

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$query = "SELECT * FROM USER WHERE username = '$username'";
	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$username = $row["username"];
		$user_password = $row["user_password"];
		$user_type = $row["user_type"];
		$email = $row["email"];
		$first_name = $row["first_name"];
		$last_name = $row["last_name"];
	}
	
	$buyer_query = "SELECT * FROM BUYER WHERE username = '$username'";
	$buyer_result = $conn->query($buyer_query);
	if ($buyer_result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$address = $row["address"];
		$phone = $row["phone"];
		$default_store_id = $row["default_store_id"];
		$default_payment = $row["default_payment"];
	}
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
			<div>Email: <input type='text' name='email' required maxlength="50" value="<?php echo $email; ?>"/></div>
			<div>First Name: <input type='text' name='first_name' required maxlength="30" readonly value="<?php echo $first_name; ?>"/></div>
			<div>Last Name: <input type='text' name='last_name' required maxlength="30" readonly value="<?php echo $last_name; ?>"/></div>
			<?php
				if ($user_type == "b" || $user_type == "m") {
					echo "<div>Phone Number: <input type='text' name='phone' required minlength=\"10\" maxlength=\"10\"/></div>";
				}
				if ($user_type == "d" || $user_type == "m") {
					echo "<div>Confirmation Code: <input type='text' name='confirmation_code' required maxlength=\"11\"/></div>";
				}
			?>
			<input type='submit' />
			<input type="button" onclick="window.location.href = '<?php echo "buyer.php" ?>';" value="Back"/>
		</form>
		</form>
	</body>
</html>