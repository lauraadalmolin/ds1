<?php
	
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$cpf = $_POST["cpf"];
	$idade = $_POST["idade"];
	$sexo = $_POST["sexo"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];

	if (empty($nome) || empty($email) || empty($senha) || empty($cpf) || empty($idade) || empty($sexo) ||  empty($cidade) || empty($estado)) {
		die("Todos os campos são obrigatórios");
	} 

	if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
		die("Somente letras e espaços em branco são permitidos no nome");
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		die("O e-mail não apresenta o formato necessário");
	}
	
	if (!preg_match("/((?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\D]{8,})/", $senha)) {
		die("A senha deve conter uma letra maiúscula, uma letra minúscula, um número e um caractere especial. Deve conter também no mínimo 8 caracteres");
	}
	
	if (!preg_match("/[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}/", $cpf)) {
		die("O CPF não respeita o formato pedido: XXX.XXX.XXX-XX");
	}

	if (!preg_match("/^[a-zA-Z ]*$/", $cidade)) {
		die("Somente letras e espaços em branco são permitidos no nome");
	}

	$filename = "/var/www/html/cadastros.txt";
	$mode = "a+";


	$arquivo = fopen($filename,$mode);
	if ($arquivo) {
		if (fwrite($arquivo, $nome . ";" . $email . ";" . $senha . ";" . $cpf . ";" . $idade . ";" . $sexo . ";" . $cidade . 
			";". $estado . ";\n")) {			
			$linhas = count(file('/var/www/html/cadastros.txt'));			
			echo "Cadastro número " . $linhas . " realizado com sucesso.<br>";
			fclose($arquivo);				
		}
		else echo "Não foi possível salvar o cadastro.";
	}

?>