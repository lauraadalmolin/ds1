<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
	include "../model/VeiculoRN.class.php";
	
	$codigo = trim($_GET["codigo"]);
	
	$rn = new VeiculoRN();
	$rn->exclui($codigo);
	
	header('Location: http://localhost/ds1/3bi/aula1/');


?>