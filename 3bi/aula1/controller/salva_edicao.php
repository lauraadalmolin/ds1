<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include "../model/VeiculoRN.class.php";
	
	$modelo = trim($_GET["modelo"]);
	if($modelo == "") $modelo = NULL;
	$ano = trim($_GET["ano"]);
	if($ano == "") $ano = NULL;
	$preco = trim($_GET["preco"]);
	if($preco == "") $preco = NULL;
	$cor = trim($_GET["cor"]);
	if($cor == "") $cor = NULL;
	$codigo = $_GET["codigo"];
	echo($codigo);
	$rn = new VeiculoRN();
	$rn->edita($codigo, $modelo, $ano, $preco, $cor);
	
	//header('Location: http://localhost/ds1/3bi/aula1/');
?>