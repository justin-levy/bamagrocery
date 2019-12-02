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
	
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Deliverer Account Information</h1>

		<form method="POST" action="update_deliverer.php">
			<form action='' method='post'>
			<div>Username: <input type='text' name='username' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $username; ?>"/></div>
			<div>First Name: <input type='text' name='first_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $first_name; ?>"/></div>
			<div>Last Name: <input type='text' name='last_name' readonly disabled="disabled" style="background: #d4d4d4;" value="<?php echo $last_name; ?>"/></div>
			
			<div>Email: <input type='email' name='email' pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{1,}$" required maxlength="50" value="<?php echo $email; ?>"/></div>
			
			<input type='submit' />
			<input type='button' onclick="window.location.href = 'delete_deliverer.php';" value="Delete"/>
			<input type="button" onclick="window.location.href = '<?php echo "deliverer.php" ?>';" value="Back"/>
		</form>
		</form>
	</body>
</html>