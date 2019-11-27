<?php
	$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
	if ($conn->connect_error) {
		die( "Connection failed: ".$conn->connect_error);
	}
?>

<html>
<body>
<h1>USER</h1>

<table border="1">
<tr>
	<th>Username</th>
	<th>Password</th>
	<th>User Type</th>
	<th>Email</th>
	<th>First Name</th>
	<th>Last Name</th>
</tr>


<?php
	$query = "SELECT * FROM USER";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$username = $row["username"];
			$password = $row["password"];
			$user_type = $row["user_type"];
			$email = $row["email"];
			$first_name = $row["first_name"];
			$last_name = $row["last_name"];
?>
			<tr>
				<td><?php echo $username; ?></td>
				<td><?php echo $password; ?></td>
				<td><?php echo $user_type; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $first_name; ?></td>
				<td><?php echo $last_name; ?></td>
			</tr>
<?php
		}
	}
	$conn->close();
?>

</table>

</body>
</html>
