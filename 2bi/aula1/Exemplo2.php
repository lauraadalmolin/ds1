<!DOCTYPE html>
<html>
<head>
	<title>Exemplo 2</title>
</head>
<body>
	<?php

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		include_once "Ponto.class.php";
		include_once "Circulo.class.php";
		include_once "Cilindro.class.php";

		$p1 = new Ponto(2, 3);
		$circ1 = new Circulo($p1->getX(), $p1->getY(), 5);
		$cilin1 = new Cilindro($p1->getX(), $p1->getY(), $circ1->getRaio(), 8);

		echo "<h3> Ponto </h3>";
		echo "<ul>";
		echo "<li>X: " . $p1->getX() . "</li>";
		echo "<li>Y: " . $p1->getY() . "</li>";
		echo "</ul>";
		echo "<h3> Círculo </h3>";
		echo "<ul>";
		echo "<li>X: " . $circ1->getX() . "</li>";
		echo "<li>Y: " . $circ1->getY() . "</li>";
		echo "<li>Área do Círculo: " . $circ1->areaCirculo() . "</li>";
		echo "</ul>";
		echo "<h3> Cilindro </h3>";
		echo "<ul>";
		echo "<li>X: " . $cilin1->getX() . "</li>";
		echo "<li>Y: " . $cilin1->getY() . "</li>";
		echo "<li>Área do Cilindro: " . $cilin1->areaCilindro() . "</li>";
		echo "<li>Volume do Cilindro: " . $cilin1->volumeCilindro() . "</li>";
		echo "</ul>";

	?>

</body>
</html>