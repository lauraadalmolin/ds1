<html>
	<link rel="stylesheet" href="view/css/bootstrap/css/bootstrap.min.css"/>
	<script type="text/javascript" src="js/script.js"></script>

<?php

	include_once "../model/FuncionarioDAO.class.php";

	session_start();
	if ($_SESSION["logado"] == true) {
		header("location:../view/home.php");
	}		
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	if (empty($login) || empty($senha)) {
		die("<p class='alert alert-warning'>Você deve preencher todos os campos.</p><a href='index.php'>Voltar</a>");
	}
	if (!(preg_match("/[a-zA-Z]{1,50}/", $login))) {
		die("<p class='alert alert-warning'>Somente letras e espaços em branco são permitidos no login. O login não pode apresentar mais de 40 caracteres.</p><a href='index.php'>Voltar</a>");
	}
	if (!preg_match("/[0-9]{4,8}/", $senha)) {
		die("<p class='alert alert-warning'>A senha deve apresentar apenas números e ter no mínimo 4 e no máximo 8 caracteres.</p><a href='index.php'>Voltar</a>");
	}	
	
	$funcionarioDAO = new FuncionarioDAO();

	$retorno = $funcionarioDAO->testaDados($login, $senha);
	
	if (!empty($retorno)) {
	
		$_SESSION["logado"] = true;
		$_SESSION["login"] = $login;
		$_SESSION["senha"] = $senha;
		# busca no banco 
		$gerente = $funcionarioDAO->isGerente($login);
		if ($gerente == true) {
			$_SESSION["admin"] = true;
		} else {
			$_SESSION["admin"] = false;	
		}
		$_SESSION["id"] = $retorno['id'];
		
		header("location:../view/home.php");
		 
	} else {
		echo "<div class='container'><div class='row'><div class='col-md-12'>";
		echo "<p class='alert alert-danger'>Login não efetuado</p>";
		echo "<button class='btn btn-default'><a href='index.php'>Voltar</a></button>";
		echo "</div></div></div>";
	}



?>	
</html>