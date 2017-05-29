<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Trabalho 1</title>
	<script type="text/javascript" src="script.js"></script>

</head>
<body>


<ul>
	<li class='batata' onclick="troca('saque')"><a>Saque</a></li>
	<li class='batata' onclick="troca('deposito')"><a>Depósito</a></li>
	<li class='batata' onclick="troca('transferencia')"><a>Transferir</a></li>
</ul>
	<?php

		include_once "Conta.class.php";
		include_once "ContaCorrente.class.php";
		include_once "ContaPoupanca.class.php";


		$cp1 = new ContaPoupanca(1, 2000);

		$cc1 = new ContaCorrente(3, 4000, 1000);
		
		$array = array($cc1->getNumero() => $cc1, $cp1->getNumero() => $cp1);
	
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		if(!empty($_POST['comando'])) {
			if ($_POST['comando'] == 1) {
				$numero = $_POST['numero'];
				$valor = $_POST['valor'];
				if ($array[$numero]->saque($valor)) {
					echo "<p>Saque realizado com sucesso!</p>"; 
				} else {

				}
			}
			if ($_POST['comando'] == 2) {
				$numero = $_POST['numero'];
				$valor = $_POST['valor'];
				$array[$numero]->deposito($valor);
			}
			if ($_POST['comando'] == 3) {
				$numero = $_POST['numero'];
				$valor = $_POST['valor'];
				$conta = $_POST['conta'];
				$array[$numero]->transferencia($valor, $array[$conta]);
			}
		}

	
		
	?>
	<br>
	<div id='saque'>

		<div class='center_align micro_div center'>
			<h1 class="big_title">Sacar</h1>
			<form method="post" action="index.php">
				<input type="number" name="numero" required placeholder="Número da conta"><br><br>
				<input type="number" name="valor" required placeholder="Valor a sacar"><br><br>
				<input type="text" name="comando" value="1" hidden>	
				<input type='submit' value='Enviar'>
			</form>
		</div>
	</div>
	<div id='deposito' style='display: none;'>

		<div class='center_align micro_div center'>
			<h1 class="big_title">Depositar</h1>
			<form method="post" action="index.php">
				<input type="number" name="numero" required placeholder="Número da conta"><br><br>
				<input type="number" name="valor" required placeholder="Valor a depositar"><br><br>
				<input type="text" name="comando" value="2" hidden>	
				<input type='submit' value='Enviar'>
			</form>
		</div>
	</div>
	<div id='transferencia' style='display: none;'>

		<div class='center_align micro_div center'>
			<h1 class="big_title">Realizar Transferência</h1>
			<form method="post" action="index.php">
				<input type="number" name="numero" required placeholder="Número da conta de origem"><br><br>
				<input type="number" name="conta" required placeholder="Número da conta de destino"><br><br>
				<input type="number" name="valor" required placeholder="Valor a transferir"><br><br>
				<input type="text" name="comando" value="3" hidden>	
				<input type='submit' value='Enviar'>
			</form>
		</div>
	</div>
	<br>
	<?php
		echo "<div class='center_align micro_div justify'>";
        echo "<h1 class='big_title'>Conta Poupança 1</h1>";
        echo "<p> Número: " . $array[1]->getNumero() . "</p>";    
        echo "<p> Saldo: " . $array[1]->getSaldo() . "</p>";   

        echo "<h1 class='big_title'>Conta Corrente 1</h1>";
        echo "<p> Número: " . $array[3]->getNumero() . "</p>";    
        echo "<p> Saldo: " . $array[3]->getSaldo() . "</p>";  

        echo "</div>";
    ?>

	

</body>
</html>

