<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>
	<body>

		<h1>Deliverer Functionality</h1>
		<?php
			$username = $_GET['username'];
		?>

		<form method="" action="">
			<input type="button" onclick="window.location.href = '<?php echo "Assignments.php?username=$username" ?>';" value="Assignments"/>
			<input type="button" onclick="window.location.href = ;" value="Account Information"/>
			<input type="button" onclick="window.location.href = '../index.php';" value="Back"/>
		</form>
	</body>
</html>
