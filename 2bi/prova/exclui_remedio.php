<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="lista_remedios.php">Farmácia</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="form_remedio.php">Novo Remédio</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_remedios.php">Listar remédios</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li class='active'><a href="pesquisar.php">Pesquisar</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>	      
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
	<?php
		session_start();

		include "remedioDAO.php";
		if (!$_SESSION["admin"] == true) {
			header("location:erro_login2.php");
		}

		$id_m = $_POST["id_m"];
	
		$res = exclui($id_m);

		// mostra mensagem de sucesso ou de fracasso:
		if ($res) {
			echo "<div class='alert alert-success' role='alert'>A nova movimentação foi excluída com sucesso!</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Não foi possível excluir a movimentação.</div>";
		}	

	?>
			</div>
		</div>
	</div>

</body>
</html