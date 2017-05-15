<?php
	// Array vazio
	$arr = array();

	// Vetor com índices numéricos começando em 0
	$arr_2 = array(1, 2, 3, 10.56, "teste");
	$arr_3[] = "oi";

	// Matriz com especificação de chaves
	// (chave => valor)
	$arr_3 = array(1 => array(5,6,7), "cores" => array("Branco", "Preto"));

	$arr_4 = array(10, 15, 23, 56, 101, 205);
	foreach($arr_4 as $v => $d) {
		echo "$v = $d<br>";
	}

	$arr_5 = array("um" => "one", "dois" => "two", "três" => "three");
	foreach($arr_5 as $c => $b) {
		echo "$c = $b<br>";
	}

?>