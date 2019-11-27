<?php

	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}

	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$utype = $_POST['utype'];
	$email = $_POST['email'];
	
	
	/*
	echo $id + '</br>';
	echo $fname;
	echo $lname;
	echo $uname;
	echo $password;
	echo $utype;
	echo $email;
	*/
	
	$insert = "INSERT INTO USER (Id, Fname, Lname, Uname, Password, Utype, Email) VALUES (?, ?, ?, ?, ?, ?, ?)";
	//echo $insert;
	
	$stmt = $conn->prepare($insert);
	$stmt->bind_param("issssss", $id, $fname, $lname, $uname, $password, $utype, $email);
	//echo $insert;
	$stmt->execute();
	
	
	$conn->close();
?>

<html>
<body>
<h1>User Added:  <?php echo $fname ?></h1>
</body>
</html>