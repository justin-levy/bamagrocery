<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1> Register
			<?php
				$user_type = $_GET['submit'];
				echo $user_type;
			?>
		</h1>
		<h2>
		</h2>
		<form action='insert.php' method='post'>
			<div>Username: <input type='text' name='username' required maxlength="30"/></div>
			<div>Password: <input type='text' name='user_password' required maxlength="20"/></div>
			<div>Confirm Password: <input type='text' name='confirm_password' required maxlength="20"/></div>
			<input type="hidden" name="user_type" value="<?php
				if ($user_type == "Buyer") echo "b";
				if ($user_type == "Deliverer") echo "d";
				if ($user_type == "Manager") echo "m";
			?>">
			<div>Email: <input type='text' name='email' required maxlength="50"/></div>
			<div>First Name: <input type='text' name='first_name' required maxlength="30"/></div>
			<div>Last Name: <input type='text' name='last_name' required maxlength="30"/></div>
			<?php
				if ($user_type == "Buyer" || $user_type == "Manager") {
					echo "<div>Phone Number: <input type='text' name='phone' required minlength=\"10\" maxlength=\"10\"/></div>";
				}
				if ($user_type == "Deliverer" || $user_type == "Manager") {
					echo "<div>Confirmation Code: <input type='text' name='confirmation_code' required maxlength=\"11\"/></div>";
				}
			?>
			<input type='submit' />
			<input type="button" onclick="window.location.href = 'register.html';" value="Back"/>
		</form>
	</body>
</html>
