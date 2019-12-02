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
			<div>Payment Name: <input type='text' name='payment_name' pattern="[a-zA-Z0-9]+" required maxlength="20"/></div>
			<div>Account Number: <input type='text' name='account_number' pattern="[0-9]+" required minlength="9" maxlength="9"/></div>
			<div>Routing Number: <input type='text' name='routing_number' pattern="[0-9]+" required minlength="9" maxlength="9"/></div>
			<div>Default: <select name="default">
				<option value="yes">Yes</option>
				<option value="no">No</option>
			</select></div>
			<input type='submit' />
			<input type="button" onclick="window.location.href = 'buyer.php';" value="Back"/>
		</form>
	</body>
</html>
