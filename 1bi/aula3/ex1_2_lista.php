<!DOCTYPE html>
<html>
<head>
	<title>Exercício 1</title>
</head>
<body>
	<p>Intersecção dos Conjuntos</p>
	<?php
		
		$conj1 = explode(",", $_POST['conj1']); 
		$conj2 = explode(",", $_POST['conj2']); 
		$intersec = array();
		
		for ($i=0; $i < count($conj1); $i++) { 
			
			for ($k=0; $k < count($conj2); $k++) { 
				
				if ($conj1[$i] == $conj2[$k]) {

					$intersec[] = $conj1[$i];
				}
			}
		}
		$intersec_novo = array();
		$teste = true;
		for ($m=0; $m < count($intersec); $m++) { 
			for ($n=0; $n < count($intersec_novo); $n++) { 
				if ($intersec[$m] == $intersec_novo[$n]) $teste = false;
			}
			if ($teste) $intersec_novo[] = $intersec[$m];
			$teste = true;

		}

		sort($intersec_novo);

		for ($i=0; $i < count($intersec_novo); $i++) { 
			echo $intersec_novo[$i] . "<br>";
		}
		

	?>
</body>
</html>