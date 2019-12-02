<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1><?php
				$user_type = $_GET['submit'];
				echo $user_type;
			?> Address</h1>
		<form action='insert_address.php' method='post'>
			<input type="hidden" name="user_type" value="<?php echo $user_type;?>">
			<input type="hidden" name="username" value="<?php echo $_GET['username'];?>">
			<input type="hidden" name="phone" value="<?php echo $_GET['phone'];?>">
			<div>Street: <input type='text' name='street' pattern="[a-zA-Z0-9 ]+" required maxlength="50"/></div>
			<div>City: <input type='text' name='city' pattern="[a-zA-Z]+" required maxlength="20"/></div>
			<div>State: <input type='text' name='state' pattern="[a-zA-Z]+" required maxlength="20"/></div>
			<div>ZIP Code: <input type='text' name='zip_code' pattern="[0-9]+" required maxlength="5" minlength="5"/></div>
			<input type='submit' />
		</form>
	</body>
</html>
