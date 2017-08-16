<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include "../model/VeiculoRN.class.php";
	$codigo = $_GET["codigo"];
	$rn = new VeiculoRN();
	$carro = $rn->busca($codigo);
	
	include "../view/tela_edicao.php"
?>

