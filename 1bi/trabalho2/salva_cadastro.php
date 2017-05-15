<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Sistema Escolar</title>
</head>
<body>
	<ul>
		<li><a class="active" href="index.html">In&iacute;cio</a></li>
		<li><a class="active" href="cadastro_aluno.html">Cadastrar Aluno</a></li>
		<li><a href="cadastro_disciplina.html">Cadastrar Disciplina</a></li>
		<li><a href="consulta_aluno.html">Buscar Aluno</a></li>
		<li><a href="matricula.php">Matricular Aluno</a></li>
	</ul>
	<br>
	<div class="medium_div center_align center">

	<?php

	if ($_POST["seletor"] == 1) {

		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];	

		if (empty($nome) || empty($email) || empty($telefone)) {
			die("<p class='error'>Todos os campos são obrigatórios</p><a href='cadastro_aluno.html'>Voltar</a>");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			die("<p class='error'>O e-mail não apresenta o formato necessário</p><a href='cadastro_aluno.html'>Voltar</a>");
		}
		if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
			die("<p class='error'>Somente letras e espaços em branco são permitidos no nome</p><a href='cadastro_aluno.html'>Voltar</a>");
		}
		if (!preg_match("/\([0-9]{2}\)[0-9]{5}-[0-9]{4}/", $telefone)) {
			die("<p class='error'>O telefone não respeita o formato pedido: (**)*****-****</p><a href='cadastro_aluno.html'>Voltar</a>");
		}

		cadastra_aluno($nome, $email, $telefone);
		echo ("<p class='success'>Cadastro concluído com sucesso!</p><a href='cadastro_aluno.html'>Voltar</a>");

	}

	if ($_POST["seletor"] == 3) {

		$nome = $_POST["nome"];
		$capacidade = $_POST["capacidade"];
		if (empty($nome) || empty($capacidade)) {
			die("<p class='error'>Todos os campos são obrigatórios</p><a href='cadastro_disciplina.html'>Voltar</a>");
		}
		if (!preg_match("/^[0-9]*$/", $capacidade)) {
			die("<p class='error'>O campo capacidade deve conter apenas números</p><a href='cadastro_disciplina.html'>Voltar</a>");
		}	
		if (!preg_match("/^[a-zA-Z0-9]*$/", $nome)) {
			die("<p class='error'>O campo nome deve conter apenas letras</p><a href='cadastro_disciplina.html'>Voltar</a>");
		}


		cadastra_disciplina($nome, $capacidade);
		echo ("<p class='success'>Cadastro concluído com sucesso!</p><a href='cadastro_disciplina.html'>Voltar</a>");


	}

	function cadastra_aluno ($nome, $email, $telefone) {

	$filename = "alunos.csv";
	$mode = "a+";

	$arquivo = fopen($filename, $mode);

	$matricula = gera_matricula();

	if ($arquivo) {
		if (fwrite($arquivo, $matricula . ";" . $nome . ";" . $email . ";" . $telefone . ";\n")) {			
			fclose($arquivo);				
		}
		else echo "Não foi possível salvar o cadastro.";
	}

	}	

	function cadastra_disciplina ($nome, $capacidade) {
		
		$filename = "disciplinas.csv";
		$mode = "a+";

		$arquivo = fopen($filename, $mode);

		$cod = gera_cod_disciplina();

		if ($arquivo) {
			if (fwrite($arquivo, $cod . ";" . $nome . ";" . $capacidade . ";\n")) {			
				fclose($arquivo);				
			}
			else echo "Não foi possível salvar o cadastro.";
		}

	}


	function gera_matricula () {
		
		$linhas = count(file("alunos.csv"));

		if ($linhas == 0) {
			return 1;
		} else {
			$linhas++;
			return $linhas;
		}

	}

	function gera_cod_disciplina() {

		$linhas = count(file("disciplinas.csv"));

		if ($linhas == 0) {
			return 1;
		} else {
			$linhas++;
			return $linhas;
		}

	}

	?>
	</div>
</body>
</html>



<?php




?>