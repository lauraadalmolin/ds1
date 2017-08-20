<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', 'On');

	session_start();

	if (!$_SESSION["logado"] == true) {
		header("location:../index.php");
	}

	include_once "../model/Carro.class.php";
	include_once "../model/Moto.class.php";
	include_once "../model/Outro.class.php";
	include_once "../model/VeiculoDAO.class.php";
	include_once "../model/RegistroDAO.class.php";
	include_once "../model/FuncionarioDAO.class.php";

	$placa = strtoupper(trim($_POST["placa"]));
	$hora = trim($_POST["hora"]);
	$data = trim($_POST["data"]);
	$tipo = trim($_POST["tipo"]);
	$marca = trim($_POST["marca"]);
	$modelo = trim($_POST["modelo"]);
	$cor = trim($_POST["cor"]);

	if (empty($cor) || empty($marca) || empty($modelo)) {
		die("<div class='alert alert-danger' role='alert'>Todos os campos são obrigatórios</div>");
	}

	// echo $placa . " " . $hora . " " . $data . " " . $tipo . " " . $marca . " " . $modelo . " " . $cor;
	if ($tipo != "") {
		if ($tipo == 1) {
			$veiculo = new Carro($placa, $marca, $modelo, $cor, $tipo);
		}
		if ($tipo == 2) {
			$veiculo = new Moto($placa, $marca, $modelo, $cor, $tipo);
		}
		if ($tipo == 3) {
			$veiculo = new Outro($placa, $marca, $modelo, $cor, $tipo);
		}

		$veiculoDAO = new VeiculoDAO();
		$r = $veiculoDAO->salvaVeiculo($veiculo);

		if ($r == 2) {
			$mensagem = "<div class='alert alert-success' role='alert'>Veículo cadastrado com sucesso!</div>";
		} else {
			$mensagem = "<div class='alert alert-danger' role='alert'>Desculpe, mas não foi possível cadastrar o veículo.</div>";
		}

		$id_funcionario = $_SESSION["id"];

		$funcionarioDAO = new FuncionarioDAO();
		$veiculoDAO = new VeiculoDAO();
		$registroDAO = new RegistroDAO();

		$veiculo = $veiculoDAO->getVeiculo($placa);
		$funcionario = $funcionarioDAO->getFuncionario($id_funcionario);
		$registro = new Registro($funcionario, null, $veiculo, $hora, $data, null, null);
		$retorno = $registroDAO->salvaEntrada($registro);
	
		if ($retorno == 1) {
			$mensagem = $mensagem . "<div class='alert alert-success' role='alert'>Check-in realizado com sucesso!</div>";
		}		
		if ($retorno == 2) {
			$mensagem = $mensagem . "<div class='alert alert-danger' role='alert'>Aconteceu algum erro ao tentar realizar o check-in, por favor verifique se os dados informados são válidos.</div>";
		}
		if ($retorno == 3) {
			$mensagem = $mensagem . "<div class='alert alert-danger' role='alert'>Não há mais vagas para esse tipo de veículo.</div>";
		}
		if ($retorno == 4) {
			$mensagem = $mensagem . "<div class='alert alert-danger' role='alert'>O carro em questão já está no estacionamento.</div>";
		}
	
		include_once "../view/mensagem.php";

	} else {
		$mensagem = "<div class='alert alert-danger' role='alert'>Você precisa selecionar um campo tipo.</div>";
		include_once "../view/mensagem.php";
	}

?>