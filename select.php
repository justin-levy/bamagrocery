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
	<th>Id</th>
	<th>Fname</th>
	<th>Lname</th>
	<th>Uname</th>
	<th>Password</th>
	<th>Utype</th>
	<th>Email</th>
</tr>


<?php
	$query = "SELECT * FROM USER";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id = $row["Id"];
			$fname = $row["Fname"];
			$lname = $row["Lname"];
			$uname = $row["Uname"];
			$password = $row["Password"];
			$Utype = $row["Utype"];
			$Email = $row["Email"];
?>
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $fname; ?></td>
				<td><?php echo $lname; ?></td>
				<td><?php echo $uname; ?></td>
				<td><?php echo $password; ?></td>
				<td><?php echo $Utype; ?></td>
				<td><?php echo $Email; ?></td>
			</tr>
<?php
		}
	}
	$conn->close();
?>

</table>

</body>
</html>
