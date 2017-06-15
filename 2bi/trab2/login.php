<!DOCTYPE html>
<html>
<head>
	<title>Página Inicial</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>	

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
	<?php
		session_start();
		if ($_SESSION["logado"] == true) {
			header("location:erro_login2.php");
		}		
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		
		if (empty($login) || empty($senha)) {
			die("<p class='alert alert-warning'>Você deve preencher todos os campos.</p><a href='index.php'>Voltar</a>");
		}
		if (!(preg_match("/[a-zA-Z]{1,50}/", $login))) {
			die("<p class='alert alert-warning'>Somente letras e espaços em branco são permitidos no login. O login não pode apresentar mais de 50 caracteres.</p><a href='index.php'>Voltar</a>");
		}
		if (!preg_match("/[0-9]{4,8}/", $senha)) {
			die("<p class='alert alert-warning'>A senha deve apresentar apenas números e ter no mínimo 4 e no máximo 8 caracteres.</p><a href='index.php'>Voltar</a>");
		}	
		
		$retorno = testa_dados($login, $senha);
		
		if (!empty($retorno)) {
		
			$_SESSION["logado"] = true;
			$_SESSION["login"] = $login;
			$_SESSION["senha"] = $senha;
			$_SESSION["id"] = $retorno['id'];

			header("location:index_logado.php");
			 
		} else {
			echo "<div class='container'><div class='row'><div class='col-md-12'>";
			echo "<p class='alert alert-danger'>Login não efetuado</p>";
			echo "<button class='btn btn-default'><a href='index.php'>Voltar</a></button>";
			echo "</div></div></div>";
		}

		function testa_dados($login, $senha) {

			$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$senha'";

			$retorno = pg_query($con, $sql);

			while ($row = pg_fetch_array($retorno)) {
				return $row;
			}

		}

	?>	

</body>
</html>