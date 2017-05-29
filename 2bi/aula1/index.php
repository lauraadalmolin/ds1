<!DOCTYPE html>
<html>
<head>
	<title>Exemplo 1</title>
</head>
<body>
	<?php 

		include_once "Carro.class.php";

		$c1 = new Carro;
		$c2 = new Carro;

		echo "<h2> Valores Originais dos Atributos</h2>";
		echo "<h3> CARRO C1 </h3>";
		echo "<ul>";
		echo "<li>Cor: " . $c1->getCor() . "</li>";
		echo "<li>Ano: " . $c1->getAno() . "</li>";
		echo "<li>Fabricante: " . $c1->getFabricante() . "</li>";
		echo "<li>Velocidade: " . $c1->getVelocidade() . "</li>";
		echo "</ul>";
		echo "<h3> CARRO C2 </h3>";
		echo "<ul>";
		echo "<li>Cor: " . $c2->getCor() . "</li>";
		echo "<li>Ano: " . $c2->getAno() . "</li>";
		echo "<li>Fabricante: " . $c2->getFabricante() . "</li>";
		echo "<li>Velocidade: " . $c2->getVelocidade() . "</li>";
		echo "</ul>";
		
		$c1->setVelocidade(70);
		$c1->setCor("Vermelho");
		$c1->setFabricante("Ford");
		$c1->frear();
		$c1->frear();

		$c2->setVelocidade(15);
		$c2->setAno(2000);
		$c2->setFabricante("Etec");
		$c2->frear();
		$c2->frear();


		echo "<h2> Valores Alterados dos Atributos</h2>";
		echo "<h3> CARRO C1 </h3>";
		echo "<ul>";
		echo "<li>Cor: " . $c1->getCor() . "</li>";
		echo "<li>Ano: " . $c1->getAno() . "</li>";
		echo "<li>Fabricante: " . $c1->getFabricante() . "</li>";
		echo "<li>Velocidade: " . $c1->getVelocidade() . "</li>";
		echo "</ul>";
		echo "<h3> CARRO C2 </h3>";
		echo "<ul>";
		echo "<li>Cor: " . $c2->getCor() . "</li>";
		echo "<li>Ano: " . $c2->getAno() . "</li>";
		echo "<li>Fabricante: " . $c2->getFabricante() . "</li>";
		echo "<li>Velocidade: " . $c2->getVelocidade() . "</li>";
		echo "</ul>";
	?>
</body>
</html>

