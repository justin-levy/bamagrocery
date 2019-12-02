<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<script> 
			function checkPassword(form) { 
				password1 = form.user_password.value; 
				password2 = form.confirm_password.value;     
				if (password1 != password2) { 
					alert ("Passwords were not the same!");
					return false; 
				}
				
				//new_username = form.username.value;
			}
        </script> 
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
		<form onsubmit='return checkPassword(this)' action='insert.php' method='post'>
			<?php echo $_GET['error']?>
			<div>Username: <input type='text' name='username' pattern="[a-zA-Z0-9]+" required maxlength="30"/></div>
			<div>Password: <input type='text' name='user_password' pattern="[a-zA-Z0-9]+" required maxlength="20"/></div>
			<div>Confirm Password: <input type='text' name='confirm_password' pattern="[a-zA-Z0-9]+" required maxlength="20"/></div>
			<input type="hidden" name="user_type" value="<?php
				if ($user_type == "Buyer") echo "b";
				if ($user_type == "Deliverer") echo "d";
				if ($user_type == "Manager") echo "m";
			?>">
			<div>Email: <input type='email' name='email' required maxlength="50"/></div>
			<div>First Name: <input type='text' name='first_name' pattern="[a-zA-Z]+" required maxlength="30"/></div>
			<div>Last Name: <input type='text' name='last_name' pattern="[a-zA-Z]+" required maxlength="30"/></div>
			<?php
				if ($user_type == "Buyer") {
					echo "<div>Phone Number: <input type='text' name='phone' pattern=\"[0-9]+\" required minlength=\"10\" maxlength=\"10\"/></div>";
				}
				if ($user_type == "Deliverer" || $user_type == "Manager") {
					echo "<div>Confirmation Code: <input type='text' name='confirmation_code' pattern=\"[0-9]+\" required maxlength=\"11\"/></div>";
				}
			?>
			<input type='submit' />
			<input type="button" onclick="window.location.href = 'register.html';" value="Back"/>
		</form>
	</body>
</html>
