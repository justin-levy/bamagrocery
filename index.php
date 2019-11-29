<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style.css">
	</head>
	<body>
		<h1>User Login</h1>
		<?php
			$error = $_GET['error'];
			echo $error;
		?>
		<form action='user.php' method='post'>
			<div>Username: <input type='text' name='username' required maxlength="30" autofocus/></div>
			<div>Password: <input type='password' name='user_password' required maxlength="20"/></div>
			<input type='submit' value='Login'/>
			<input type="button" onclick="window.location.href = 'register/register.html';" value="Register"/>
		</form>
	</body>
</html>
