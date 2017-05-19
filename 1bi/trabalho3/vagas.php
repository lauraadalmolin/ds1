<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">	
	<title>Vagas</title>
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
        		<h3 class='text-center'>Situação do Estacionamento</h3>
    			<br>
				<?php
					error_reporting(E_ALL);
					ini_set('display_errors', 'On');

					$con = pg_connect("host=localhost user=postgres password=1234 dbname=estacionamento");

					$sql = "SELECT count (id_vaga) as ocupadas FROM vagas WHERE disponivel = false";
					$res = pg_query($con, $sql);
					$ocupadas = -1;

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$ocupadas = $array["ocupadas"];
					}

					$sql = "SELECT count (id_vaga) as total FROM vagas";
					$res = pg_query($con, $sql);
					$total = -1;

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$total = $array["total"];
					}

					if ($ocupadas != 12) {
						echo "<div class='alert alert-info' role='alert'>Vagas ocupadas: " . $ocupadas . "</div>";
						echo "<div class='alert alert-info' role='alert'>Vagas livres: " . ($total - $ocupadas) . "</div><br>";				
					} else {
						echo "<div class='alert alert-warning' role='alert'>Desculpe, mas o estacionamento está lotado.</div><br>";
					}

					// estacionamento

					echo "<div class='container'>";
					echo 	"<div class='row'>";

					$informacoes = array(1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => "", 8 => "", 9 => "", 10 => "", 11 => "", 12 => "");

					// SELECT r.id_vaga, r.placa FROM registros r WHERE r.saida IS NULL ORDER BY r.ID_VAGA

					$sql = "SELECT r.id_vaga, r.placa, r.entrada FROM registros r WHERE r.saida IS NULL ORDER BY r.id_vaga";

					$res = pg_query($con, $sql);

					while(($array = pg_fetch_array($res)) !== FALSE) {

						$id_vaga = $array["id_vaga"];
						$placa = $array["placa"];
						$entrada = $array["entrada"];
						$entradas[$id_vaga] = $entrada;
						$placas[$id_vaga] = $placa;
						$ids[] = $id_vaga;
						
					}
		
					for ($i=0; $i < count($ids); $i++) { 
						$informacoes[$ids[$i]] = $placas[$ids[$i]];
					}

					for ($i=1; $i <= count($informacoes); $i++) { 
						echo "<div class='col-md-3'>";
			        	echo  	"<div class='panel panel-default'>";
			        	echo		"<div class='panel-body'>";	
						if ($informacoes[$i] == "") {
							echo 		"<img src='white.png' width='100%'>";
							echo 		"<h4 class='text-center'>Vaga ". $i . " - Disponível</h4>";
							echo        "<br>";
			        		echo "    	</div>";
						    echo "	</div>";
						    echo "</div>";

						} else {
							echo 		"<img src='car.png' width='100%'>";
							echo 		"<h4 class='text-center'>Vaga ". $i. " - " . $placas[$i] . "</h4>";
							echo 		"<h5 class='text-center'>Entrada: ". $entradas[$i] . "</h5>";
			        		echo "    	</div>";
						    echo "	</div>";
						    echo "</div>";
						}
						

					}

					



				?>
				
			        
				</div>
			</div>
		</div>
	</div>

</body>
</html>