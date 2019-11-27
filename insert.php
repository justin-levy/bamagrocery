<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_type = $_POST['user_type'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	
	$query = "SELECT * FROM USER WHERE username ='$username'";
	$result = $conn->query($query);
	if ($result->num_rows >= 1) {
		header( "Location: insert.html" );
		exit ;
	}
	
	if ($user_type != 'b' && $user_type != 'd' && $user_type != 'm' && $user_type != 'B' && $user_type != 'D' && $user_type != 'M') {
		header( "Location: insert.html" );
		exit ;
	}
	
	$insert = "INSERT INTO USER (username, password, user_type, email, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?)";
	
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("ssssss", $username, $password, $user_type, $email, $first_name, $last_name);
	//echo $insert;
	$stmt->execute();
	
	
	$conn->close();
?>

<html>
<body>
<h1>User Added:  <?php echo $first_name ?></h1>
</body>
</html>