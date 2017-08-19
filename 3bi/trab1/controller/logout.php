<?php
	session_start();
	if ($_SESSION["logado"] !== true) {
		header("location:index.php");
	}
	//$_SESSION["logado"] = false;
	session_unset();
	session_destroy();
	header("location:../index.php");
?>

