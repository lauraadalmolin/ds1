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
	      <a class="active navbar-brand" href="index_logado.php">Finanças</a>
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

					error_reporting(E_ALL);
					ini_set('display_errors', 1);

					if (!$_SESSION["logado"] == true) {
						header("location:erro_login.php");
					}

					$id = $_SESSION['id'];
					if (!empty($_POST['mes'])) { 
						$mes = $_POST['mes'];
						$ano = $_POST['ano'];
						valida($mes, $ano);
					} else {
						$mes = date('m');
						$ano = "20".date('y');
					}
					
					$vetor = buscaMes($id, $mes, $ano);
					echo "<div class='panel panel-default'>";
  					echo	"<div class='panel-heading'>Relação Geral de Movimentações</div>";
  					echo 	"<div class='panel-body'>";    				
    				echo 		"<p>Para pesquisar os dados de um mês específico, por favor preencha os campos abaixo:</p>";
    				echo 		"<form method='post' action='index_logado.php'>";
    				echo 			"<div class='col-md-5'><input type='number' required class='form-control' name='mes' placeholder='Mês(M)'></div>";
    				echo 			"<div class='col-md-5'><input type='number' required class='form-control' name='ano' placeholder='Ano(AAAA)'></div>";
    				echo 			"<div class='col-md-2'><button type='submit' class='btn btn-default'>Enviar</button></form></div>";
    				echo 		"<br><br><hr>";
  					echo 		"<p>Os registros a seguir são referentes ao mês: ".$mes."/".$ano."</p>";
  					echo	"</div>";

  					echo  	"<table class='table'>";
  					echo 		"<thead>";
  					echo 			"<th>ID Movimentação</th>";
  					echo 			"<th>Tipo</th>";
  					echo 			"<th>Valor</th>";
  					echo 			"<th>Data</th>";
  					echo 			"<th>Efetivada</th>";
  					echo 			"<th>Comentário</th>";
  					echo 			"<th>Categoria</th>";
  					echo 			"<th>Editar</th>";
  					echo 			"<th>Excluir</th>";
  					echo		"</thead><tbody>";

  					$saldo_mes = 0;

					for ($i=0; $i < count($vetor); $i++) { 
						if ($vetor[$i]["efetivada"] == "SIM") {
							if ($vetor[$i]["tipo"] == "receita") {
								$saldo_mes += $vetor[$i]["valor"];
							} else {
								$saldo_mes -= $vetor[$i]["valor"];
							}
						}
						$efetivada = "false";
						if ($vetor[$i]["efetivada"] == "SIM") {
							$efetivada = "true";
						} 
						$comentario = $vetor[$i]["comentario"];
						if ($vetor[$i]["comentario"] == "") {
							$comentario = "-";
						}
						echo "<tr>";
							echo "<th>". $vetor[$i]["id_m"]."</th>";
							echo "<th>". $vetor[$i]["tipo"]."</th>";
							echo "<th>". $vetor[$i]["valor"]."</th>";
							echo "<th>". $vetor[$i]["data"]."</th>";
							echo "<th>". $vetor[$i]["efetivada"]."</th>";
							echo "<th>". $vetor[$i]["comentario"]."</th>";
							echo "<th>". $vetor[$i]["categoria"]."</th>";
							echo "<th><form method='post' action='edita_movimentacao.php'>".
										"<input type='text' name='id_m' value=".$vetor[$i]['id_m']." hidden>".
										"<input type='text' name='tipo' value=".$vetor[$i]['tipo']." hidden>".
										"<input type='text' name='valor' value=".$vetor[$i]['valor']." hidden>".
										"<input type='text' name='data' value=".$vetor[$i]['data']." hidden>".
										"<input type='text' name='categoria' value=".$vetor[$i]['categoria']." hidden>".
										"<input type='text' name='efetivada' value=".$efetivada." hidden>".
										"<input type='text' name='comentario' value=".$comentario." hidden>".
									"<button type='submit' class='btn btn-default btn-sm'>".
									"<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button></form></th>";
							echo "<th><form method='post' action='exclui_movimentacao.php'>".
										"<input type='text' name='id_m' value=".$vetor[$i]['id_m']." hidden>".
										"<input type='text' name='valor' value=".$vetor[$i]['valor']." hidden>".
										"<input type='text' name='efetivada' value=".$efetivada." hidden>".
										"<input type='text' name='tipo' value=".$vetor[$i]['tipo']." hidden>".
									"<button type='submit' class='btn btn-default btn-sm'>".
									"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></form></th>";
						echo "</tr>";
					}

					echo "</tbody></table>";
					echo "<p>O saldo desse mês foi igual a: ".$saldo_mes."</p></div>";

					function valida($mes, $ano) {
						if (!preg_match("/[0-1][0-9]/", $mes) || !preg_match("/[0-9]/", $mes)) {
							die("<div class='alert alert-danger' role='alert'>O mês não respeita o formato pedido: MM</div><a href='index_logado.php'>Voltar</a>");
						}
						if (!preg_match("/[0-9]{4}/", $ano)) {
							die("<div class='alert alert-danger' role='alert'>O ano não respeita o formato pedido: AAAA</div><a href='index_logado.php'>Voltar</a>");
						}
					}

				?>
			</div>
		</div>
	</div>
</body>