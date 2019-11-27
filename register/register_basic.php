<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css">
	</head>
	<body>
		<h1> Register
			<?php
				$user_type = $_GET['submit'];
				echo $user_type;
			?>
			</h1>
		<form action='insert.php' method='post'>
			<div>Username: <input type='text' name='username' /></div>
			<div>Password: <input type='text' name='password' /></div>
			<input type="hidden" name="user_type" value="<?php
				if ($user_type == "Buyer") echo "b";
				if ($user_type == "Deliverer") echo "d";
				if ($user_type == "Manager") echo "m";
			?>">
			<div>Email: <input type='text' name='email' /></div>
			<div>First Name: <input type='text' name='first_name' /></div>
			<div>Last Name: <input type='text' name='last_name' /></div>
			<input type='submit' />
			<input type="button" onclick="window.location.href = 'register.html';" value="Back"/>
		</form>
	</body>
</html>
