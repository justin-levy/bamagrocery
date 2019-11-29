<?php
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
?>

<html>
<body>
<h1>

<?php
	$inUsername = $_POST['username'];
	$inPassword = $_POST['user_password'];

	$query = "SELECT * FROM USER WHERE username ='$inUsername' AND user_password = '$inPassword'";
	//echo $query;

	$result = $conn->query($query);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();

		$username = $row["username"];
		$user_password = $row["user_password"];
		$user_type = $row["user_type"];
		$email = $row["email"];
		$first_name = $row["first_name"];
		$last_name = $row["last_name"];

		if ($user_type == 'b' || $user_type == 'B') {
			echo 'Buyer';
			header( "Location: buyer/buyer.html" );
		exit ;
		}
		if ($user_type == 'd' || $user_type == 'D') {
			echo 'Deliverer';
		}
		if ($user_type == 'm' || $user_type == 'M') {
			echo 'Manager';
		}
?>
</h1>

<?php

		echo "Welcome, ";
		echo $first_name;
	}
	else {
		header( "Location: index.php" );
		exit ;
	}
	$conn->close();
?>

</body>
</html>
