<?php
	session_start();
	//error_redivorting(E_ALL);
	//ini_set('disdivlay_errors', 1);
	include_once "../model/PrecoDAO.class.php";

	if (!$_SESSION["logado"] == true) {
		header("location:../index.php");
	}
	if ($_SESSION["admin"] != true) {
		header("location:../view/home.php");
	}

	$preco_carro = str_replace(",", ".", $_POST["preco_carro"]);
	$preco_moto = str_replace(",", ".", $_POST["preco_moto"]);
	$preco_outro = str_replace(",", ".", $_POST["preco_outro"]);
	$preco_pernoite = str_replace(",", ".", $_POST["preco_pernoite"]);
	$preco_diaria = str_replace(",", ".", $_POST["preco_diaria"]);

	if (!preg_match("/^[0-9].[0-9]|[0-9]*$/", $preco_carro)) {
		die("<div class='alert alert-danger'>Os valores devem conter apenas números, ponto ou vírgula.</div><a href='altera_precos.php'>Voltar</a>");
	}
	if (!preg_match("/^[0-9].[0-9]|[0-9]*$/", $preco_moto)) {
		die("<div class='alert alert-danger'>Os valores devem conter apenas números, ponto ou vírgula.</div><a href='altera_precos.php'>Voltar</a>");
	}
	if (!preg_match("/^[0-9].[0-9]|[0-9]*$/", $preco_outro)) {
		die("<div class='alert alert-danger'>Os valores devem conter apenas números, ponto ou vírgula.</div><a href='altera_precos.php'>Voltar</a>");
	}
	if (!preg_match("/^[0-9].[0-9]|[0-9]*$/", $preco_pernoite)) {
		die("<div class='alert alert-danger'>Os valores devem conter apenas números, ponto ou vírgula.</div><a href='altera_precos.php'>Voltar</a>");
	}
	if (!preg_match("/^[0-9].[0-9]|[0-9]*$/", $preco_diaria)) {
		die("<div class='alert alert-danger'>Os valores devem conter apenas números, ponto ou vírgula.</div><a href='altera_precos.php'>Voltar</a>");
	}

	$preco = new preco($preco_carro, $preco_moto, $preco_outro, $preco_pernoite, $preco_diaria);
	$precoDAO = new precoDAO();
	$retorno = $precoDAO->alteraprecos($preco);
	$mensagem = "<div class='alert alert-success'>Os valores foram alterados com sucesso.</div>";
	include_once "../view/mensagem.php";
?>