<?php
	session_start();
	if (!$_SESSION["logado"] == true) {
		header("location:../index.php");
	}
	if ($_SESSION["admin"] != true) {
		header("location:../view/home.php");
	}
	include_once "../model/PrecoDAO.class.php";
	$precoDAO = new PrecoDAO();
	$preco = $precoDAO->getPrecos();
	include_once "../view/form_precos.php";
?>
