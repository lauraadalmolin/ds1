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
	        <li class="active"><a href="lista_remedios.php">Listar remédios</a></li>
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
					error_reporting(E_ALL);
					ini_set('display_errors', 1);
					if (!$_SESSION["logado"] == true) {
						header("location:erro_login.php");
					}
					include "remedioDAO.php";
					include_once "Remedio.class.php";
					$id = $_SESSION['id'];
					$remedios = buscaTodos();
					echo "<div class='panel panel-default'>";
  					echo	"<div class='panel-heading'>Relação Geral de Medicamentos</div>";
  					echo 	"<div class='panel-body'>";
    				echo 		"<p>Aqui você poderá consultar todos os remédios cadastrado no sistema.</p>";
  					echo		"</div>";
  					echo  	"<table class='table'>";
  					echo 		"<thead>";
  					echo 			"<th>ID</th>";
  					echo 			"<th>Nome</th>";
  					echo 			"<th>Nome do Fabricante</th>";
  					echo 			"<th>Controlado</th>";
  					echo 			"<th>Quantidade</th>";
  					echo 			"<th>Preço</th>";
  					echo 			"<th>Editar</th>";
  					echo 			"<th>Excluir</th>";
  					echo		"</thead><tbody>";

				

					for ($i=0; $i < count($remedios); $i++) { 
						$controlado = "NÃO";
						if ($remedios[$i]->getControlado() == "t") {
							$controlado = "SIM";
							$remedios[$i]->setControlado(1);
						} else {
							$remedios[$i]->setControlado(0);
						} 
						
						echo "<tr>";
							echo "<th>". $remedios[$i]->getId()."</th>";
							echo "<th>". $remedios[$i]->getNome()."</th>";
							echo "<th>". $remedios[$i]->getNomeF()."</th>";
							echo "<th>". $controlado ."</th>";
							echo "<th>". $remedios[$i]->getQuantidade()."</th>";
							echo "<th>". $remedios[$i]->getPreco()."</th>";
							echo "<th><form method='post' action='edita_remedio.php'>".
										"<input type='text' name='id_m' value=". $remedios[$i]->getId()." hidden>".
										"<input type='text' name='nome' value=". $remedios[$i]->getNome()." hidden>".
										"<input type='text' name='nome_f' value=". $remedios[$i]->getNomeF()." hidden>".
										"<input type='text' name='controlado' value=".$remedios[$i]->getControlado()." hidden>".
										"<input type='text' name='quantidade' value=".$remedios[$i]->getQuantidade()." hidden>".
										"<input type='text' name='preco' value=".$remedios[$i]->getPreco()." hidden>".
									"<button type='submit' class='btn btn-default btn-sm'>".
									"<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></form></th>";
							echo "<th><form method='post' action='exclui_remedio.php'>".
										"<input type='text' name='id_m' value=".
										$remedios[$i]->getId()." hidden>".
									"<button type='submit' class='btn btn-default btn-sm'>".
									"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></form></th>";
						echo "</tr>";
					}

					echo "</tbody></table>";

				?>
			</div>
		</div>
	</div>
</body>