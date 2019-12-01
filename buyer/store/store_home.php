<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
		?> Store Homepage</h1>
		<form method="" action="">
			<input type="button" onclick="window.location.href = 'find_item.php';" value="Find Item"/>
			<input type="button" onclick="window.location.href = 'cart.php';" value="View Cart"/>
			<input type="button" onclick="window.location.href = '../buyer.php?order=cancel';" value="Cancel Order"/>
			<input type="button" onclick="window.location.href = '../buyer.php';" value="Back"/>
		</form>
	</body>
</html>