<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Functionality</h1>
		<?php
			$username = $_GET['username'];
		?>
		<form method="" action="">
			<input type="button" onclick="window.location.href = '';" value="New Order"/>
			<input type="button" onclick="window.location.href = '';" value="Order History"/>
			<input type="button" onclick="window.location.href = '';" value="Account Information"/>
			<input type="button" onclick="window.location.href = '<?php echo "payments.php?username=$username" ?>';" value="Payment Methods"/>
			<input type="button" onclick="window.location.href = '../index.php';" value="Back"/>
		</form>
	</body>
</html>