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
				<?php

					$con = pg_connect("host=localhost user=postgres password=1234 dbname=estacionamento");

					$sql = "SELECT count (id_vaga) as ocupadas FROM vagas WHERE disponivel = false";
					$res = pg_query($con, $sql);
					$total = 10;
					$ocupadas = -1;

					while(($array = pg_fetch_array($res)) !== FALSE) {
						$ocupadas = $array["ocupadas"];
					}

					if ($ocupadas != 10) {
						echo "<div class='alert alert-info' role='alert'>Vagas ocupadas: " . $ocupadas . "</div>";
						echo "<div class='alert alert-info' role='alert'>Vagas livres: " . ($total - $ocupadas) . "</div><br>";
						
					} else {
						echo "<div class='alert alert-danger' role='alert'>Desculpe, mas o estacionamento está lotado.</div><br>";
					}
				?>
			</div>
		</div>
	</div>

</body>
</html>