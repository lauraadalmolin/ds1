<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">	
	<title></title>
</head>
<body>
<ul class="nav nav-tabs">
		<li><a role="presentation" class="active" href="index.html">Início</a></li>
		<li><a role="presentation" href="vagas.php">Situação do Estacionamento</a></li>
	</ul>
	<br>
	<div class="container">
        <div class="row">
        	<div class="col-md-12"> 
				<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 'On');

				$placa = strtoupper(trim($_POST["placa"]));
				$hora = trim($_POST["hora"]);
				$data = trim($_POST["data"]);
				$registro = trim($_POST["registro"]);

				if (strcmp($registro, "entrada") == 0) {

					if (busca_placa($placa)) {			
						salva_entrada($placa, $data, $hora);	
					} else {
						// Cadastro completo:
						echo "<div class='panel panel-default'><div class='panel-heading'>Por favor, cadastre o veículo primeiro:</div>";
						echo "<div class='panel-body'>";
						echo 	"<form method='post' action='salva_cadastro_veiculo.php'>";
						echo 		"<select class='form-control' name='tipo'>";
						echo 			"<option selected disabled value=''>Tipo de veículo</option>";
						echo 			"<option value='carro'>Carro</option>";
						echo 			"<option value='moto'>Moto</option>";
						echo 			"<option value='camionete'>Camionete</option>";
						echo 		"</select><br>";	
						echo		"<input class='form-control' type='text' name='marca' id='marca' required placeholder='Marca'><br>";
						echo		"<input class='form-control' type='text' name='modelo' id='modelo' required  placeholder='Modelo'><br>";
						echo		"<input class='form-control' type='text' name='cor' id='cor' required  placeholder='Cor'><br>";
						echo		"<input type='text' value=$placa name='placa' hidden>";
						echo		"<input type='text' value=$hora name='hora' hidden>";
						echo		"<input type='text' value=$data name='data' hidden>";
						echo		"<input type='submit' value='Enviar'>";
						echo 	"</form>";
						echo "</div></div>";
					}
				} else {

					salva_saida($placa, $data, $hora);

				}

				function salva_entrada($placa, $data, $hora) {

					$timestamp = $data . " " . $hora;

					$con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");

					$sql = "SELECT id_vaga FROM vagas WHERE disponivel = TRUE ORDER BY id_vaga LIMIT 1";

					$res = pg_query($con, $sql);

					$vaga = -1;

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$vaga = $array["id_vaga"];
					}

					if ($vaga != -1 && procura_estacionamento($placa) == false) {
						
						$sql = "INSERT INTO registros (entrada, id_vaga, placa) VALUES ('$timestamp', $vaga, '$placa')";
						$res = pg_query($con, $sql);
						if ($res != false) {
							$sql = "UPDATE vagas SET disponivel = FALSE WHERE id_vaga = '$vaga'";
							$res = pg_query($con, $sql);
							echo "<div class='alert alert-success' role='alert'>Check-in realizado com sucesso!</div>";

						} else {
							echo "<div class='alert alert-danger' role='alert'>Aconteceu algum erro ao tentar realizar o check-in, por favor verifique se os dados informados são válidos.</div>";

						}
						pg_close($con);
					} else {
						echo "<div class='alert alert-danger' role='alert'>O carro em questão já está no estacionamento.</div>";
					}
				}

				function procura_estacionamento($placa) {

					$con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");

					$sql = "SELECT placa FROM registros WHERE saida IS NULL AND placa ='$placa'";
					
					if (pg_num_rows(pg_query($con, $sql)) == 0) { 
						return false;
					} else {
						return true;
					}
				}

				function salva_saida($placa, $data, $hora) {

					$timestamp = $data . " " . $hora;
					
					// validar $timestamp: deve ser maior que a $entrada

					$con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");


					$sql = "SELECT placa FROM registros WHERE placa = '$placa'";
					$res = pg_query($con, $sql);
					$placa2 = "";

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$placa2 = $array["placa"];
					}
					if($placa2 != "") {

					$sql = "SELECT id_vaga, entrada FROM registros WHERE saida IS NULL AND placa LIKE '$placa'";
					$res = pg_query($con, $sql);
					$vaga = -1;
					$entrada = "";
					while(($array = pg_fetch_array($res)) !== FALSE) {
						$vaga = $array["id_vaga"];
						$entrada = $array["entrada"];
					}

					
					$sql = "SELECT EXTRACT (EPOCH FROM '$timestamp'::TIMESTAMP)/3600 - EXTRACT (EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = '$placa' AND saida IS NULL";
					$res = pg_query($con, $sql);
					
					while(($array = pg_fetch_array($res)) !== FALSE) {
						$value = $array["value"];
						
						if ($value < 0) {
							die("<div class='alert alert-danger' role='alert'>Desculpe, mas você informou uma data de saída menor do que a de entrada.</div>");
						}
					}



				
					$sql = "UPDATE registros SET saida = '$timestamp' WHERE saida IS NULL AND placa = '$placa'";
					$res = pg_query($con, $sql);

					if ($res != false) {

						$sql = "UPDATE vagas SET disponivel = TRUE WHERE id_vaga = '$vaga'";
						$res = pg_query($con, $sql);
					}

					pg_close($con);

					echo "<div class='alert alert-success' role='alert'>Check-out realizado com sucesso!</div>";

					echo "<div class='alert alert-warning' role='alert'>Preço a pagar: R$". calcula_preco($entrada, $placa) ."</div>";

					} else {
						echo "<div class='alert alert-danger' role='alert'>Desculpe, mas não foi encontrado nenhum carro com a placa informada.</div>";
					}
				}

				function busca_placa($placa) {

					$con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");

					$sql = "SELECT placa FROM veiculos WHERE placa = '$placa'";

					if (pg_num_rows(pg_query($con, $sql)) != 0) { 
						return true;
					} else {
						return false;
					}
					pg_close($con);

				}

				function calcula_preco($entrada, $placa) {
					$con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");

					$sql = "SELECT (EXTRACT(EPOCH FROM saida) - EXTRACT(EPOCH FROM entrada))/3600 as value, EXTRACT(HOUR FROM entrada) as entrada, EXTRACT(HOUR FROM saida) as saida  FROM registros WHERE placa = '$placa' AND entrada = '$entrada'";
					$res = pg_query($con, $sql);
					$n = 0;
					$entrada = 0;
					$saida = 0;

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$n = $array["value"];
						$entrada = $array["entrada"];
						$saida = $array["saida"];
					}
					if ($n > 12) {						
						$dias = ceil($n/24);
						return $dias * 25;
					} else {
						if ($entrada >= 20 && $saida <= 8) {
							return 18;
						} else {
							$sql = "SELECT tipo FROM veiculos WHERE placa = '$placa'";
							$res = pg_query($con, $sql);
							$tipo = "";
							while(($array = pg_fetch_array($res)) !== FALSE) {
								$tipo = $array["tipo"];
							}
							if ($tipo == "carro") {
								return $n * 5;
							}
							if ($tipo == "moto") {
								return $n * 4;
							}
							if ($tipo == "camionete") {
								return $n * 7;
							}
						}
					}


				}

				?>
			</div>
		</div>
	</div>

</body>
</html>

