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

// seta as variáveis do form e da sessão
$placa = strtoupper(trim($_POST["placa"]));
$hora = trim($_POST["hora"]);
$data = trim($_POST["data"]);
$entrada_saida = trim($_POST["entrada_saida"]);
$id_funcionario = $_SESSION["id"];

// cria os daos
$funcionarioDAO = new FuncionarioDAO();
$veiculoDAO = new VeiculoDAO();
$registroDAO = new RegistroDAO();

if (strcmp($entrada_saida, "entrada") == 0) {

	$existe = $veiculoDAO->exists($placa);
	
	if ($existe == true) {	
	
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
		include_once "../view/cadastra_veiculo.php";		
	}

} else {
	
	$veiculo = $veiculoDAO->getVeiculo($placa);
	$funcionario = $funcionarioDAO->getFuncionario($id_funcionario);
	$registro = $registroDAO->getRegistro($veiculo, $funcionario);
	$registro->setDataSaida($data);
	$registro->setHoraSaida($hora);
	$retorno = $registroDAO->salvaSaida($registro);
	if ($retorno == 1) {
		$mensagem = "<div class='alert alert-danger' role='alert'>Desculpe, mas você informou uma data de saída menor do que a de entrada.</div>";
	}
	if ($retorno == 2) {
		$mensagem = "<div class='alert alert-success' role='alert'>Check-out realizado com sucesso!</div>";
		$preco = $registroDAO->calculaPreco($registro);
		$mensagem = $mensagem . "<div class='alert alert-warning' role='alert'>Preço a pagar: R$". $preco ."</div>";
	}
	if ($retorno == 3) {
		$mensagem = "<div class='alert alert-danger' role='alert'>Desculpe, mas não foi encontrado nenhum carro com a placa informada.</div>";
	}
	include_once "../view/mensagem.php";
}



?>