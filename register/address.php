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
			<div>Street: <input type='text' name='street' /></div>
			<div>City: <input type='text' name='city' /></div>
			<div>State: <input type='text' name='state' /></div>
			<div>ZIP Code: <input type='text' name='zip_code' /></div>
			<input type='submit' />
		</form>
	</body>
</html>
