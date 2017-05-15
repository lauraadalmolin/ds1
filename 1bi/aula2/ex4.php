<html>
	<head>
		<title>Exercício 4</title>
	</head>
	<body>
	<!-- 
	4. Um número perfeito é um número cuja soma de seus divisores (exceto ele mesmo) é igual ao próprio
	número. Por exemplo, 6 é um número perfeito (pois seus divisores são 1, 2 e 3, e 1+2+3 = 6). Faça uma
	aplicação PHP que mostre uma tabela HTML contendo os números perfeitos na faixa de 1 a 1000.
	-->
	<?php
		$somadiv = 0;
		for ($i=1; $i < 1000; $i++) { 
			for ($j = 1; $j < $i ; $j++) { 
				if($i % $j == 0) $somadiv += $j;
			}
			if ($somadiv == $i) printf ($i . "<br>");
			$somadiv = 0;
		}
	?>

	</body>
</html>
