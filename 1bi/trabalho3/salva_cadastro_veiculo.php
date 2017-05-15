<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">	
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
					$placa = strtoupper(trim($_POST["placa"]));
					$hora = trim($_POST["hora"]);
					$data = trim($_POST["data"]);
					$tipo = trim($_POST["tipo"]);
					$marca = trim($_POST["marca"]);
					$modelo = trim($_POST["modelo"]);
					$cor = trim($_POST["cor"]);

					// echo $placa . " " . $hora . " " . $data . " " . $tipo . " " . $marca . " " . $modelo . " " . $cor;

					salva_veiculo($placa, $tipo, $marca, $modelo, $cor);

					salva_entrada($placa, $data, $hora);

					function salva_veiculo($placa, $tipo, $marca, $modelo, $cor) {

						$con = pg_connect("host=localhost user=postgres password=1234 dbname=estacionamento");

						$sql = "INSERT INTO veiculos (placa, tipo, marca, modelo, cor) VALUES ('$placa', '$tipo', '$marca', '$modelo', '$cor')";

						if(pg_query($con, $sql) === false) {
							echo "<div class='alert alert-danger' role='alert'>Desculpe, mas não foi possível cadastrar o veículo.</div>";
						} else {
							echo "<div class='alert alert-success' role='alert'>Veículo cadastrado com sucesso!</div>";
						}
						pg_close($con);

					}

					function salva_entrada($placa, $data, $hora) {

						$timestamp = $data . " " . $hora;

						$con = pg_connect("host=localhost user=postgres password=1234 dbname=estacionamento");

						$sql = "SELECT id_vaga FROM vagas WHERE disponivel = TRUE ORDER BY id_vaga LIMIT 1";

						$res = pg_query($con, $sql);

						$vaga = -1;

						while(($array = pg_fetch_array($res)) !== FALSE) {
							$vaga = $array["id_vaga"];
					
						}

						if ($vaga != -1) {
							
							$sql = "INSERT INTO registros (entrada, id_vaga, placa) VALUES ('$timestamp', '$vaga', '$placa')";
							$res = pg_query($con, $sql);
							$sql = "UPDATE vagas SET disponivel = FALSE WHERE id_vaga = '$vaga'";
							$res = pg_query($con, $sql);
							pg_close($con);
							echo "<div class='alert alert-success' role='alert'>Check-in realizado com sucesso!</div>";
						} else {
							echo "<div class='alert alert-danger' role='alert'>Desculpe, mas o estacionamento está lotado.</div>";
						}



					}


				?>
			</div>
		</div>
	</div>
</body>
</html>