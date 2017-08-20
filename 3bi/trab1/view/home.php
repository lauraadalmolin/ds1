<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">	
	<title>Gerenciador de Estacionamentos</title>


</head>
<body>
	<?php
		session_start();
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		if (!$_SESSION["logado"] == true) {
			header("location:../index.php");
		}
	?>
	<ul class="nav nav-tabs">
		<li><a role="presentation" class="active" href="home.php">Início</a></li>
		<li><a role="presentation" href="../controller/estacionamento.php">Situação do Estacionamento</a></li>
		<?php
			if($_SESSION["admin"] == true) {
				echo "<li><a role='presentation' href='../controller/altera_precos.php'>Alterar Preços</a></li>";
			}

		?>
		<li><a role="presentation" href="../controller/logout.php">Logout</a></li>
		
	</ul>
	<br>
	<div class="container">
        <div class="row">
        	<div class="col-md-12"> 
        		<div class="panel panel-default">
        		<br>
    				<h3 class='text-center'>Entradas e Saídas do Estacionamento</h3>
    				<br>
	        		<div class="panel-heading">
						Por favor, preencha o formulário abaixo:
					</div>
					<div class="panel-body ">
						<form method="post" action="../controller/salva.php" onsubmit="return testa()">
							<input type="text" class="form-control" name="placa" id="placa" required onkeyup="validaPlaca('placa')" placeholder="Placa do veículo (XXX-YYYY)"><br>
							<span class="input-group-addon">
								<input type="radio" name="entrada_saida" value="entrada"> Entrada
							</span> 
							<span class="input-group-addon">
								<input type="radio" name="entrada_saida" value="saida"> Saída 
							</span> <br>
							<input type="text" class="form-control" name="data" id="data" required onkeyup="validaData('data')" placeholder="Data de entrada ou saída (AAAA-MM-DD)"><br>
							<input type="text" class="form-control" name="hora" id="hora" required onkeyup="validaHora('hora')" placeholder="Hora de entrada ou saída (HH:MM)"><br>
							<input type='submit' value='Enviar'>
							<br>
							<br>
							<div id="mensagem" class='alert alert-danger' role='alert' style="display:none;">Todos os campos devem ser válidos para que o formulário possa ser submetido.</div>
							<br>
							<br>
							<p>*Caso a placa não conste no sistema, você será direcionado a uma página para cadastrar o veículo em questão.</p>
						</form>
					</div>
				</div>
		
			</div>
		</div>
	</div>

</body>
</html>