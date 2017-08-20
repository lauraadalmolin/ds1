<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="../view/css/bootstrap/css/bootstrap.min.css"/>
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
		<li><a role="presentation" href="estacionamento.php">Situação do Estacionamento</a></li>
		<?php
			if($_SESSION["admin"] == true) {
				echo "<li><a role='presentation' href='altera_precos.php'>Alterar Preços</a></li>";
			}

		?>
		<li><a role="presentation" href="logout.php">Logout</a></li>
	</ul>
	<br>
	<div class="container">
        <div class="row">
        	<div class="col-md-12">
				<div class='panel panel-default'>
					<div class='panel-heading'>
						Por favor, cadastre o veículo primeiro:
					</div>
					<div class='panel-body'>
					 	<form method='post' action='salva_cadastro_veiculo.php'>
					 		<select class='form-control' name='tipo'>
					 			<option selected disabled value=''>Tipo de veículo</option>
					 			<option value='1'>Carro</option>
					 			<option value='2'>Moto</option>
					 			<option value='3'>Outro</option>
					 		</select><br>	
							<input class='form-control' type='text' name='marca' id='marca' required placeholder='Marca'><br>
							<input class='form-control' type='text' name='modelo' id='modelo' required  placeholder='Modelo'><br>
							<input class='form-control' type='text' name='cor' id='cor' required  placeholder='Cor'><br>
							<input type='text' value=<?php echo $placa; ?> name='placa' hidden>
							<input type='text' value=<?php echo $hora; ?> name='hora' hidden>
							<input type='text' value=<?php echo $data; ?> name='data' hidden>
							<input type='submit' value='Enviar'>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>