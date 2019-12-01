<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>
		<h1>Buyer Functionality</h1>
		<?php
			session_start();
			$username = $_SESSION['username'];
			$order_id = $_SESSION['order_id'];
			
			if($_GET['order'] == 'cancel' && $order_id != "") {
				
				$conn = new mysqli("localhost:8889", "root", "root", "bamagrocery");
				if ($conn->connect_error) {
					die( "Connection failed: ".$conn->connect_error);
				}
				
				$insert = "DELETE FROM SELECTITEM WHERE order_id=?;";
				$stmt = $conn->prepare($insert);
				$stmt->bind_param("i", $order_id);
				$stmt->execute();
				
				$insert = "DELETE FROM ORDERFROM WHERE order_id=?;";
				$stmt = $conn->prepare($insert);
				$stmt->bind_param("i", $order_id);
				$stmt->execute();
				
				$insert = "DELETE FROM ORDERS WHERE order_id=?;";
				$stmt = $conn->prepare($insert);
				$stmt->bind_param("i", $order_id);
				$stmt->execute();
				
				$_SESSION['order_id'] = "";
			}
		?>
		<form method="" action="">
			<?php echo $_GET['error']?>
			<input type="button" onclick="window.location.href = 'list_stores.php';" value="New Order"/>
			<input type="button" onclick="window.location.href = '';" value="Order History"/>
			<input type="button" onclick="window.location.href = 'account_info.php';" value="Account Information"/>
			<input type="button" onclick="window.location.href = 'payments.php';" value="Payment Methods"/>
			<input type="button" onclick="window.location.href = '../index.php?logout=true';" value="Logout"/>
		</form>
	</body>
</html>