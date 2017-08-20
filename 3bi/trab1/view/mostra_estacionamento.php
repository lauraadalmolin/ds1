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
		<li><a role="presentation" href="#">Situação do Estacionamento</a></li>
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
        	<h3 class='text-center'>Situação do Estacionamento</h3><br>
	<?php echo $mensagem; ?>	


</body>
</html>