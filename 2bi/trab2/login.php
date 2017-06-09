<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if ($_SESSION["logado"] == true) {
			header("location:erro_login2.php");
		}
		session_start();
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		
		$login = $_POST['login'];
		$senha = $_POST['senha'];
	
		if (!(preg_match("/[a-zA-Z]{1,50}/", $login))) {
			die("<p class='error'>Somente letras e espaços em branco são permitidos no login. O login não pode apresentar mais de 50 caracteres.</p><a href='index.php'>Voltar</a>");
		}
		if (!preg_match("/[0-9]{4,8}/", $senha)) {
			die("<p class='error'>A senha deve apresentar apenas números e ter no mínimo 4 e no máximo 8 caracteres.</p><a href='index.php'>Voltar</a>");
		}	
		
		$retorno = testa_dados($login, $senha);
		
		if (!empty($retorno)) {
		
			$_SESSION["logado"] = true;
			$_SESSION["login"] = $login;
			$_SESSION["senha"] = $senha;
			$_SESSION["id"] = $retorno['id'];
			$_SESSION["time"] = time();
			echo "<a href='form_movimentacao.php'>Nova Movimentação</a>";
			echo "<a href='logout.php'>Logout</a>";
			 
		} else {
			echo "<p>Login não efetuado</p>";
			echo "<a href='index.php'>Voltar</a>";
		}

		function testa_dados($login, $senha) {

			$con = pg_connect("host=localhost user=postgres password=postgres dbname=financas");

			$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha ='$senha'";

			$retorno = pg_query($con, $sql);

			while ($row = pg_fetch_array($retorno)) {
				return $row;
			}

		}

	?>	

</body>
</html>