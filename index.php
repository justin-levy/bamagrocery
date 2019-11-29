<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./style.css">
	</head>
	<body>
		<h1>User Login</h1>
		<form action='user.php' method='post'>
			<div>Username: <input type='text' name='username' /></div>
			<div>Password: <input type='text' name='user_password' /></div>
			<input type='submit' value='Login'/>
			<input type="button" onclick="window.location.href = 'register/register.html';" value="Register"/>
		</form>
	</body>
</html>
