<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_POST['username'];
	$user_password = $_POST['user_password'];
	$confirm_password = $_POST['confirm_password'];
	$user_type = $_POST['user_type'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	
	$user_type_long;
	if ($user_type == 'b') $user_type_long = "Buyer";
	if ($user_type == 'd') $user_type_long = "Deliverer";
	if ($user_type == 'm') $user_type_long = "Manager";

	if ($user_password != $confirm_password) {
		header( "Location: register_basic.php?submit=$user_type_long" );
		exit ;
	}

	$query = "SELECT * FROM USER WHERE username ='$username'";
	$result = $conn->query($query);
	if ($result->num_rows >= 1) {
		header( "Location: register_basic.php?error=That%20Username%20is%20already%20taken" );
		exit ;
	}

	if ($user_type != 'b' && $user_type != 'd' && $user_type != 'm' && $user_type != 'B' && $user_type != 'D' && $user_type != 'M') {
		header( "Location: register_basic.php?submit=$user_type_long" );
		exit ;
	}

	// need to check confirmation code here!!!
	
	$insert = "INSERT INTO USER (username, user_password, user_type, email, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)";

	$stmt = $conn->prepare($insert);
	$stmt->bind_param("ssssss", $username, $user_password, $user_type, $email, $first_name, $last_name);
	//echo $insert;
	$stmt->execute();


	$conn->close();

	if ($user_type == 'b' || $user_type == 'B') {
		$phone = $_POST['phone'];
		header( "Location: address.php?submit=Buyer&username=$username&phone=$phone" );
		exit ;
	}
	if ($user_type == 'd' || $user_type == 'D') {
		header( "Location: ../index.php" );
		exit ;
	}
	if ($user_type == 'm' || $user_type == 'M') {
		header( "Location: register_manager.php?username=$username" );
		exit ;
	}
?>
