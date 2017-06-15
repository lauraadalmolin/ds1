<!DOCTYPE html>
<html>
<head>
	<title>Finanças</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index_logado.php">Finanças</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="form_movimentacao.php">Nova movimentação</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_movimentacoes.php">Listar movimentações</a></li>
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

		include "movimentacaoDAO.php";
		if (!$_SESSION["logado"] == true) {
			header("location:erro_login.php");
		}

		$id_u = $_SESSION["id"];
		$id_m = $_POST["id_m"];
		$valor = $_POST["valor"];
		$efetivada = $_POST["efetivada"];
		$tipo = $_POST["tipo"];

		$res = exclui($id_u, $id_m, $valor, $efetivada, $tipo);

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