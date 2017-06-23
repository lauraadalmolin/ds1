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
	        <li class="active"><a href="pesquisar.php">Pesquisar</a></li>
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

					if ($_POST['tipo'] == 1) {
						$pnome = $_POST['pnome'];
						
						$remedios = buscaNome($pnome);
						echo "<div class='panel panel-default'>";
	  					echo	"<div class='panel-heading'>Medicamentos que apresentam o nome contendo: $pnome</div>";
	  					
	  					echo  	"<table class='table'>";
	  					echo 		"<thead>";
	  					echo 			"<th>Nome</th>";
	  					echo 			"<th>Preço</th>";
	  					echo		"</thead><tbody>";
	  					for ($i=0; $i < count($remedios); $i++) { 
	  						echo "<tr>";
	  						echo "<th>". $remedios[$i]->getNome()."</th>";
	  						echo "<th>". $remedios[$i]->getPreco()."</th>";
	  						echo "</tr>";
	  					}
	  					echo "</tbody></table>";

					} 
					if ($_POST['tipo'] == 2) {
						$fnome = $_POST['fnome'];
						$remedios = buscaFornecedor($fnome);
						echo "<div class='panel panel-default'>";
	  					echo	"<div class='panel-heading'>Medicamentos que apresentam o fornecedor: $fnome</div>";
	  					echo  	"<table class='table'>";
	  					echo 		"<thead>";
	  					echo 			"<th>ID</th>";
	  					echo 			"<th>Nome</th>";
	  					echo 			"<th>Nome do Fabricante</th>";
	  					echo 			"<th>Controlado</th>";
	  					echo 			"<th>Quantidade</th>";
	  					echo 			"<th>Preço</th>";
	  					echo		"</thead><tbody>";
	  					for ($i=0; $i < count($remedios); $i++) { 
	  						$controlado = "NÃO";
							if ($remedios[$i]->getControlado() == "t") {
								$controlado = "SIM";								
							} 
	  						echo "<tr>";
							echo "<th>". $remedios[$i]->getId()."</th>";
							echo "<th>". $remedios[$i]->getNome()."</th>";
							echo "<th>". $remedios[$i]->getNomeF()."</th>";
							echo "<th>". $controlado ."</th>";
							echo "<th>". $remedios[$i]->getQuantidade()."</th>";
							echo "<th>". $remedios[$i]->getPreco()."</th>";
							echo "</tr>";
	  					}
	  					echo "</tbody></table>";

					}
					if ($_POST['tipo'] == 3) {
						$remedios = buscaControlados();
						echo "<div class='panel panel-default'>";
	  					echo	"<div class='panel-heading'>Medicamentos Controlados</div>";
	  					echo  	"<table class='table'>";
	  					echo 		"<thead>";
	  					echo 			"<th>ID</th>";
	  					echo 			"<th>Nome</th>";
	  					echo 			"<th>Nome do Fabricante</th>";
	  					echo 			"<th>Controlado</th>";
	  					echo 			"<th>Quantidade</th>";
	  					echo 			"<th>Preço</th>";
	  					echo		"</thead><tbody>";
	  					for ($i=0; $i < count($remedios); $i++) { 
	  						$controlado = "NÃO";
							if ($remedios[$i]->getControlado() == "t") {
								$controlado = "SIM";								
							} 
	  						echo "<tr>";
							echo "<th>". $remedios[$i]->getId()."</th>";
							echo "<th>". $remedios[$i]->getNome()."</th>";
							echo "<th>". $remedios[$i]->getNomeF()."</th>";
							echo "<th>". $controlado ."</th>";
							echo "<th>". $remedios[$i]->getQuantidade()."</th>";
							echo "<th>". $remedios[$i]->getPreco()."</th>";
							echo "</tr>";
	  					}
	  					echo "</tbody></table>";

					}

					if ($_POST['tipo'] == 4) {
						$remedios = buscaEstoqueBaixo();
						echo "<div class='panel panel-default'>";
	  					echo	"<div class='panel-heading'>Medicamentos Controlados</div>";
	  					echo  	"<table class='table'>";
	  					echo 		"<thead>";
	  					echo 			"<th>ID</th>";
	  					echo 			"<th>Nome</th>";
	  					echo 			"<th>Nome do Fabricante</th>";
	  					echo 			"<th>Controlado</th>";
	  					echo 			"<th>Quantidade</th>";
	  					echo 			"<th>Preço</th>";
	  					echo		"</thead><tbody>";
	  					for ($i=0; $i < count($remedios); $i++) { 
	  						$controlado = "NÃO";
							if ($remedios[$i]->getControlado() == "t") {
								$controlado = "SIM";								
							} 
	  						echo "<tr>";
							echo "<th>". $remedios[$i]->getId()."</th>";
							echo "<th>". $remedios[$i]->getNome()."</th>";
							echo "<th>". $remedios[$i]->getNomeF()."</th>";
							echo "<th>". $controlado ."</th>";
							echo "<th>". $remedios[$i]->getQuantidade()."</th>";
							echo "<th>". $remedios[$i]->getPreco()."</th>";
							echo "</tr>";
	  					}
	  					echo "</tbody></table>";

					} 
					if (empty($_POST['tipo'])) {
						echo "Nenhuma consulta foi realizada.";
					}
					
				?>
			</div>
		</div>
	</div>
</body>