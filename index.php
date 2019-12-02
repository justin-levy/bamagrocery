<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style.css">
	</head>
	<body>
		<?php
			session_start();
			$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
			if ($conn->connect_error) {
				die( "Connection failed: ".$conn->connect_error);
			}
			
			if($_GET['logout'] == 'true') {
				$_SESSION['username'] = "";
				
				if($_SESSION['order_id'] != "") {
					$insert = "DELETE FROM SELECTITEM WHERE order_id=?;";
					$stmt = $conn->prepare($insert);
					$stmt->bind_param("i", $order_id);
					$stmt->execute();
					
					$insert = "DELETE FROM ORDERFROM WHERE order_id=?;";
					$stmt = $conn->prepare($insert);
					$stmt->bind_param("i", $order_id);
					$stmt->execute();
					
					$insert = "DELETE FROM ORDERS WHERE order_id=?;";
					$stmt = $conn->prepare($insert);
					$stmt->bind_param("i", $order_id);
					$stmt->execute();
					
					$_SESSION['order_id'] = "";
				}
			}
			
			$username = $_SESSION['username'];
			echo $username;
			if ($username != NULL) {
				$query = "SELECT * FROM USER WHERE username ='$username'";
		
				$result = $conn->query($query);
				if ($result->num_rows == 1) {
					$row = $result->fetch_assoc();
					$user_type = $row["user_type"];
		
					if ($user_type == 'b' || $user_type == 'buyer') {
						header( "Location: buyer/buyer.php" );
						exit ;
					}
					if ($user_type == 'd' || $user_type == 'deliverer') {
						header( "Location: deliverer/deliverer.php" );
						exit ;
					}
					if ($user_type == 'm' || $user_type == 'manager') {
						header( "Location: manager/manager.php" );
						exit ;
					}
				}
			}
		?>
		<h1>User Login</h1>
		<form action='user.php' method='post'>
			<div>Username: <input type='text' name='username' pattern="[a-zA-Z0-9]+" required maxlength="30" autofocus/></div>
			<div>Password: <input type='password' name='user_password' pattern="[a-zA-Z0-9]+" required maxlength="20"/></div>
			<?php
				$error = $_GET['error'];
				echo "<h3 style=\"color: red;\">$error</h3>";
			?>
			<input type='submit' value='Login'/>
			<input type="button" onclick="window.location.href = 'register/register.html';" value="Register"/>
		</form>
	</body>
</html>
