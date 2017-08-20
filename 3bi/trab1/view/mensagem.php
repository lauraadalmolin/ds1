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
		if (!$_SESSION["logado"] == true) {
			header("location:../index.php");
		}
	?>
	<ul class="nav nav-tabs">
		<li><a role="presentation" class="active" href="../view/home.php">Início</a></li>
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
        		
        		<br>
    				<h3 class='text-center'>Entradas e Saídas do Estacionamento</h3>
    				<br>
					<div class="panel-body ">
						<?php echo $mensagem; ?>						
					</div>
				</div>
		
			</div>
		</div>
	</div>

</body>
</html>