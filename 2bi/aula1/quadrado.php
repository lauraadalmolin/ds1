<!DOCTYPE html>
<html>
<head>
	<title>Exemplo 1</title>
</head>
<body>
	<?php 

		include_once "Quadrado.class.php";

		$q1 = new Quadrado;
		$q1->lado = 5;

		echo "<h3> Quadrado 1 </h3>";
		echo "<ul>";
		echo "<li>Lado: " . $q1->lado . "</li>";
		echo "<li>Area: " . $q1->area() . "</li>";
		echo "<li>Perímetro: " . $q1->perimetro() . "</li>";
		echo "<li>Diagonal: " . $q1->diagonal() . "</li>";
		echo "</ul>";

		$q2 = new Quadrado;
		$q2->lado = 8;

		echo "<h3> Quadrado 2 </h3>";
		echo "<ul>";
		echo "<li>Lado: " . $q2->lado . "</li>";
		echo "<li>Area: " . $q2->area() . "</li>";
		echo "<li>Perímetro: " . $q2->perimetro() . "</li>";
		echo "<li>Diagonal: " . $q2->diagonal() . "</li>";
		echo "</ul>";

		$q3 = new Quadrado;
		$q3->lado = 7;

		echo "<h3> Quadrado 3 </h3>";
		echo "<ul>";
		echo "<li>Lado: " . $q3->lado . "</li>";
		echo "<li>Area: " . $q3->area() . "</li>";
		echo "<li>Perímetro: " . $q3->perimetro() . "</li>";
		echo "<li>Diagonal: " . $q3->diagonal() . "</li>";
		echo "</ul>";

		
	?>
</body>