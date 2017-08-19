<!DOCTYPE html>
<html>
<head>
	<title>Aula 2</title>
</head>
<body>
	<?php
		session_start();
		if ($_SESSION["logado"] !== true) {
			header("location:index.php");
		}
		session_unset();
		session_destroy();
		header("location:index.php");
	?>

</body>
</html>