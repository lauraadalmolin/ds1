<?php
	$nome = trim($_POST["nome"]);
	$duracao = trim($_POST["duracao"]);
	$sinopse = trim($_POST["sinopse"]);
	
	$con = pg_connect("host=localhost user=postgres password=1234 dbname=filmes");

	$sql = "INSERT INTO filmes (titulo, duracao, sinopse) VALUES ('$nome', 60, '$sinopse')";

	if(pg_query($con, $sql) === false)
		echo "Oops! Erro na consulta.";
	else
		echo "Filme cadastrado com sucesso!";
	pg_close($con);


?>