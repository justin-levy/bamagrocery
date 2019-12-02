<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>

		<h1>Manager Functionality</h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
		?>

		<form method="" action="">
			<?php echo $_GET['error']?>
			<input type="button" onclick="window.location.href = 'revenue.php';" value="View Revenue Report"/>
			<input type="button" onclick="window.location.href = 'order_list.php';" value="View Orders"/>
			<input type="button" onclick="window.location.href = 'item_list.php';" value="View Inventory"/>
			<input type="button" onclick="window.location.href = 'account_info.php';" value="Account Information"/>
			<input type="button" onclick="window.location.href = '../index.php?logout=true';" value="Logout"/>
		</form>
	</body>
</html>
