<html>
	<head>
		<title>Exercício 2</title>
	</head>
	<body>
	<!-- 
	2. Sendo H = 1 + 1/2 + 1/3 + 1/4 + ... + 1/N, escreva um programa em PHP para calcular o número H,
	considerando N = 100.
	-->
	<?php
		$j = 1.0;
		for ($i=2; $i <= 100; $i++) { 
			$j += 1 / $i;
		}
		echo $j;
	?>

	</body>
</html>
