<!DOCTYPE html>
<html>
<head>
	<title>Aula 2</title>
</head>
<body>
	<?php
		session_start();
		$delta = time() - $_SESSION["time"];
		$delta = $delta / 60;
		echo "Você ficou logado por: ". $delta;
		session_unset();
		session_destroy();

		header("refresh:15;url=/ds1/2bi/aula2/index.php");




	?>

</body>
</html>