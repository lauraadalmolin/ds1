<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>	
	<?php
		session_start();
		if ($_SESSION["logado"] == true) {
			header("location:index_logado.php");
		}
	?>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Finanças</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-left">
	        <li class="active"><a href="#">Login</a></li>
	      </ul>	      
	    </div>
	  </div>
	</nav>
	<div class='container'>
		<div class='row'>
			<div class='col-md-4'>
				<div class="thumbnail">
      				<img src="remedio.jpg" alt="50%">
      				<br>
      				<hr>
      				<br>
      				<p class="text-center">Seja bem-vindo(a) à nossa farmácia. Por favor, realize o login para continuar.</p>
      			</div>
			</div>
			<div class='col-md-8'>
				<div class="panel panel-primary">
					<div class="panel-heading">
					    <h3 class="panel-title">Login</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='login.php'>
							<input type='text' class="form-control" name='login' placeholder='Login'><br>
							<input type='password' class="form-control" name='senha' placeholder='Senha'><br>
							<button type="submit" class="btn btn-default">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>