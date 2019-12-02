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
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Beverages';" value="Beverages"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Baking%20Goods';" value="Baking Goods"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Canned%20Goods';" value="Canned Goods"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Cleaning%20Products';" value="Cleaning Products"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Dairy';" value="Dairy"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Frozen%20Foods';" value="Frozen Foods"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Meat';" value="Meat"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Personal%20Care';" value="Personal Care"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Produce';" value="Produce"/>
			<input type="button" onclick="window.location.href = 'items_list.php?food_group=Others';" value="Others"/>
			<input type="button" onclick="window.location.href = 'checkout.php';" value="Checkout"/>
			<input type="button" onclick="window.location.href = 'store_home.php';" value="Back"/>
		</form>
	</body>
</html>