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
	        <li class="active"><a href="form_remedio.php">Novo Remédio</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_remedios.php">Listar remédios</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="pesquisar.php">Pesquisar</a></li>
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
		$id_m = trim($_POST["id_m"]);

		$nome = trim($_POST["nome"]);
		$nome_f = trim($_POST["nome_f"]);
		$controlado = $_POST["controlado"];
		$quantidade = trim($_POST["quantidade"]);
		$preco = trim($_POST["preco"]);
	
		$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);

		valida($remedio);

		$res = edita($remedio);

		if ($res) {
			echo "<div class='alert alert-success' role='alert'>As alterações foram salvas com sucesso!</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Não foi possível salvar as alteraçãoes.</div>";
		}

		
		function valida($remedio) {
			if (empty($remedio->getNome()) || empty($remedio->getNomeF()) || empty($remedio->getQuantidade()) || empty($remedio->getPreco())) {
			die("<div class='alert alert-danger' role='alert'>Todos os campos são obrigatórios, com excessão do comentário</div><a href='form_remedio.php'>Voltar</a>");
			}	
			if (!preg_match("/[0-9]/", $remedio->getQuantidade())) {
				die("<div class='alert alert-danger' role='alert'>A quantidade deve conter apenas números.</div><a href='form_remedio.php'>Voltar</a>");
			}
		}


	?>

			</div>
		</div>
	</div>

</body>
</html>

