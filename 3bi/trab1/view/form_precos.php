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
		if ($_SESSION["admin"] != true) {
			header("location:../view/home.php");
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
						Alteração de preços
					</div>
					<div class='panel-body'>
					 	<form method='post' action='salva_alteracao.php'>
					 		Preço por hora para carros:<input class='form-control' type='number' name='preco_carro' required value=<?php echo $preco->getPrecoCarro();?>><br>
							Preço por hora para motos:<input class='form-control' type='number' name='preco_moto' required value=<?php echo $preco->getPrecoMoto();?>><br>
							Preço por hora para outros:<input class='form-control' type='number' name='preco_outro' required value=<?php echo $preco->getPrecoOutro();?>><br>
							Preço da pernoite:<input class='form-control' type='number' name='preco_pernoite' required value=<?php echo $preco->getPrecoPernoite();?>><br>
							Preço da diária:<input class='form-control' type='number' name='preco_diaria' required value=<?php echo $preco->getPrecoDiaria();?>><br>
						
							<input type='submit' value='Enviar'>
					 	</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>