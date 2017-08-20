<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="view/css/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">	
	<title>Gerenciador de Estacionamentos</title>
</head>
<body>
	<?php
		session_start();
		if ($_SESSION["logado"] == true) {
			header("location:view/home.php");
		}
	?>
	<ul class="nav nav-tabs">
		<li><a role="presentation" class="active" href="#">Início</a></li>
	</ul>
	<br>
	<div class="container">
        <div class="row">
        	<div class="col-md-12"> 
        		<div class="panel panel-default">
    				<h3 class='text-center'>Login</h3>
	        		<div class="panel-heading">
						Por favor, preencha o formulário abaixo:
					</div>
					<div class="panel-body ">
						<form method="post" action="controller/login.php">
							<input type="text" class="form-control" name="login" required placeholder="Login"><br>
							<input type="password" class="form-control" name="senha" required placeholder="Senha"><br>
							<input type='submit' value='Enviar'>
							<br>
						</form>
					</div>
				</div>
		
			</div>
		</div>
	</div>

</body>
</html>