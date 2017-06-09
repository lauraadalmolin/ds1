<!DOCTYPE html>
<html>
<head>
	<title>Aula 2</title>
</head>
<body>
	<?php
		session_start();
		if (!$_SESSION["logado"] == true) {
			header("location:erro_login.php");
		}
		session_unset();
		session_destroy();
		echo "<a href='index.php'>Voltar</a>";
	?>

</body>
</html>