<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Functionality</h1>
		<?php
			echo $_POST['username'];
		?>
		<form method="" action="">
			<input type="button" onclick="window.location.href = '';" value="New Order"/>
			<input type="button" onclick="window.location.href = '';" value="Order History"/>
			<input type="button" onclick="window.location.href = '';" value="Account Information"/>
			<input type="button" onclick="window.location.href = '';" value="Payment Methods"/>
			<input type="button" onclick="window.location.href = '../index.php';" value="Back"/>
		</form>
	</body>
</html>
