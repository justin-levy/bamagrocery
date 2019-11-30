<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Store Homepage</h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
			$store_id = $_SESSION['store_id'];
		?>
		<form method="" action="">
			<input type="button" onclick="window.location.href = 'find_item.php';" value="Find Item"/>
			<input type="button" onclick="window.location.href = '';" value="View Cart"/>
			<input type="button" onclick="window.location.href = '';" value="Cancel Order"/>
			<input type="button" onclick="window.location.href = '';" value="Back"/>
		</form>
	</body>
</html>