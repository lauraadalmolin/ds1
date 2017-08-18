<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	include "../model/VeiculoRN.class.php";
	
	$modelo = trim($_GET["modelo"]);
	if($modelo == "") $modelo = NULL;
	$ano = trim($_GET["ano"]);
	if($ano == "") $ano = NULL;
	
	$gerente = new VeiculoRN();
	$lista = $gerente->consulta($modelo, $ano);
	
	$_DADOS = array("veiculos" => $lista);
	

	include_once "../view/result.php";


 ?>