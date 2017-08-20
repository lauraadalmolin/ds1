<?php
	include_once "../model/PrecoDAO.class.php";
	$precoDAO = new PrecoDAO();
	$preco = $precoDAO->getPrecos();
	include_once "../view/form_precos.php";
?>
