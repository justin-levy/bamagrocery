<?php
	session_start();
	$username = $_SESSION['username'];
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>New Payment</h1>
		<form action='insert_payment.php' method='post'>
			<input type="hidden" name="username" value="<?php echo $username;?>">
			<div>Payment Name: <input type='text' name='payment_name' required maxlength="20"/></div>
			<div>Account Number: <input type='text' name='account_number' required minlength="9" maxlength="9"/></div>
			<div>Routing Number: <input type='text' name='routing_number' required minlength="9" maxlength="9"/></div>
			<div>Default: <select name="default">
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select></div>
			<input type='submit' />
		</form>
	</body>
</html>
