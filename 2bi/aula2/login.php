<!DOCTYPE html>
<html>
<head>
	<title>Aula 2</title>
</head>
<body>
	<?php
		session_start();
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
	
		if (!(preg_match("/[a-zA-Z]{1,12}/", $login))) {
			die("<p class='error'>Somente letras e espaços em branco são permitidos no login</p><a href='index.php'>Voltar</a>");
		}
		if (!preg_match("/[0-9]{4,8}/", $senha)) {
			die("<p class='error'>A senha não possui as características necessárias.</p><a href='index.php'>Voltar</a>");
		}	
		
		$retorno = testa_dados($login, $senha);
		
		if (!empty($retorno)) {
		
			session_cache_expire(7);
			$_SESSION["login"] = $login;
			$_SESSION["senha"] = $senha;
			$_SESSION["id"] = $retorno['id'];
			$_SESSION["time"] = time();

			echo "<h1>Obrigada por logar</h1><br>";
			echo "<h2>Login: ". $retorno['login']. "</h2>";
			echo "<h2>E-mail: ".$retorno['email']."</h2>";
			echo "<a href='logout.php'>Logout</a>";
			 
		} else {
			echo "<p>Login não efetuado</p>";
			echo "<a href='index.php'>Voltar</a>";
		}

		function testa_dados($login, $senha) {

			$con = pg_connect("host=localhost user=postgres password=postgres dbname=sistema");

			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$senha'";

			$retorno = pg_query($con, $sql);

			while ($row = pg_fetch_array($retorno)) {
				return $row;
			}

		}

	?>	

</body>
</html>