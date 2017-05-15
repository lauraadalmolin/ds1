<?php
	$nome = trim($_POST["nome"]);
	$semestre = trim($_POST["duracao"]);
	$professor = trim($_POST["sinopse"]);

	$con = pg_connect("host=localhost user=postgres password=postgres dbname=filmes");

	$sql = "INSERT INTO disciplinas (nome, duracao, sinopse) VALUES ('$nome', '$duracao', '$sinopse')";

	if(pg_query($con, $sql) === false)
		echo "Oops! Erro na consulta.";
	else
		echo "Disciplina cadastrada com sucesso!";
	pg_close($con);


?>