<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		session_start();
		include "movimentacaoDAO.php";
		if (!$_SESSION["logado"] == true) {
			header("location:erro_login.php");
		}

		$tipo = $_POST["tipo"];
		$categoria = $_POST["categoria"];
		$efetivada = $_POST["efetivada"];
		$data = trim($_POST["data"]);
		$comentario = trim($_POST["comentario"]);
		$id_u = $_SESSION["id"];

		// validação do formulário

		//

		// funções

		// 
		function valida ($tipo, $categoria, $efetivada, $data, $comentario) {
			if (empty($tipo) || empty($categoria) || empty($efetivada) || empty($data) || empty($comentario)) {
				die("<div class='alert alert-danger' role='alert'>Todos os campos são obrigatórios</div>");
			}
			if (!preg_match("/[0-9]{4,8}/", $senha)) {

			}
		}

	?>

</body>
</html>