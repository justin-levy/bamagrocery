<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Functionality</h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
		?>
		<form method="" action="">
			<input type="button" onclick="window.location.href = '';" value="New Order"/>
			<input type="button" onclick="window.location.href = '';" value="Order History"/>
			<input type="button" onclick="window.location.href = '<?php echo "account_info.php" ?>';" value="Account Information"/>
			<input type="button" onclick="window.location.href = '<?php echo "payments.php" ?>';" value="Payment Methods"/>
			<input type="button" onclick="window.location.href = '../index.php';" value="Back"/>
		</form>
	</body>
</html>