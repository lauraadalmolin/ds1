<html>
	<head>
		<title>Exercício 3</title>
	</head>
	<body>
	<!-- 
	3. A série de Fibonacci é formada pela seguinte sequência: 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ... etc. Escreva um
	programa que gere a série de Fibonacci enquanto os números forem menores do que 1000. Mostre esses
	números em uma tabela, formatada utilizando CSS.
	-->
	<?php
		$i = 1;
		$j = 0;
		$k = 0;
		printf("<table><tr><td style='border: solid 1px;'>Sequencia de Fibonacci</td></tr><tr><td style='border: solid 1px; text-align: center;'>1</tr></td>");
		while ($i < 1000) {			
			$k = $j;
			$j = $i;
			$i = $j + $k;
			printf("<tr><td style='border: solid 1px; text-align: center;'>" . $i . "</td></tr>");
		}

	?>

	</body>
</html>
