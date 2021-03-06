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

		$tipo = $_POST["tipo"];
		$valor = $_POST["valor"];
		$categoria = $_POST["categoria"];
		$efetivada = $_POST["efetivada"];
	
		$data = trim($_POST["data"]);
		$comentario = trim($_POST["comentario"]);
		$id_u = $_SESSION["id"];

		// validação do formulário
		valida($tipo, $categoria, $efetivada, $data, $valor);

		// salva
		$res = salva_movimentacao($tipo, $categoria, $efetivada, $data, $comentario, $id_u, $valor);

		// mostra mensagem de sucesso ou de fracasso:
		if ($res) {
			echo "<div class='alert alert-success' role='alert'>A nova movimentação foi salva com sucesso!</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Não foi possível salvar a movimentação.</div>";
		}

		// funções:
		function valida ($tipo, $categoria, $efetivada, $data, $valor) {
			if (empty($tipo) || empty($categoria) || empty($efetivada) || empty($data)) {
			die("<div class='alert alert-danger' role='alert'>Todos os campos são obrigatórios, com excessão do comentário</div><a href='form_movimentacao.php'>Voltar</a>");
			}	
			if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $data)) {
				die("<div class='alert alert-danger' role='alert'>A data não respeita o formato pedido: AAAA-MM-DD</div><a href='form_movimentacao.php'>Voltar</a>");
			}
			if (!preg_match("/[0-9]+[.]{0,1}/", $valor)) {
				die("<div class='alert alert-danger' role='alert'>O valor deve ser informado com . ao invés de vírgula.</div><a href='form_movimentacao.php'>Voltar</a>");
			}
		}	

	?>
			</div>
		</div>
	</div>

</body>
</html>