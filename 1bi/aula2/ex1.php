<html>
	<head>
		<title>Exercício 1</title>
	</head>
	<body>
	<!-- 
	1. Escreva uma aplicação em PHP que apresente todos os números positivos divisíveis por 4 que sejam
	menores que 200. Mostre o resultado em uma tabela HTML, formatada utilizando CSS.
	-->
	<?php 
		echo "<table style='border: solid 1px; text-align: center;'>";
		for ($i = 0; $i <= 200; $i++) { 
			if ($i % 4 == 0) printf ("<tr><td style='border: solid 1px;>" . $i . "</tr></td>"); 
		}
		echo "</table>";
	?>

	</body>
</html>
