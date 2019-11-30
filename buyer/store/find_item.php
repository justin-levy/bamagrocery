<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style.css">
	</head>
	<body>
		<h1>Buyer Functionality</h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
		?>
		<form method="" action="">
			<input type="button" onclick="window.location.href = '';" value="Beverages"/>
			<input type="button" onclick="window.location.href = '';" value="Baking Goods"/>
			<input type="button" onclick="window.location.href = '';" value="Canned Goods"/>
			<input type="button" onclick="window.location.href = '';" value="Cleaning Products"/>
			<input type="button" onclick="window.location.href = '';" value="Dairy"/>
			<input type="button" onclick="window.location.href = '';" value="Frozen Foods"/>
			<input type="button" onclick="window.location.href = '';" value="Meat"/>
			<input type="button" onclick="window.location.href = '';" value="Personal Care"/>
			<input type="button" onclick="window.location.href = '';" value="Produce"/>
			<input type="button" onclick="window.location.href = '';" value="Others"/>
			<input type="button" onclick="window.location.href = '';" value="Checkout"/>
			<input type="button" onclick="window.location.href = 'store_home.php';" value="Back"/>
		</form>
	</body>
</html>