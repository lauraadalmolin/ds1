<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Sistema Escolar</title>
</head>
<body>
	<ul>
		<li><a class="active" href="index.html">In&iacute;cio</a></li>
		<li><a class="active" href="cadastro_aluno.html">Cadastrar Aluno</a></li>
		<li><a href="cadastro_disciplina.html">Cadastrar Disciplina</a></li>
		<li><a href="consulta_aluno.html">Buscar Aluno</a></li>
		<li><a href="matricula.php">Matricular Aluno</a></li>
	</ul>
	<br>
	<div class='center_align small_div center'>
		<h1 class='big_title'>Realizar Matrícula</h1>
		<form method="post" action="salva_matricula.php">
			
			<select name="aluno">
				<?php
					$array =  array();
					$arquivo = fopen("alunos.csv", "r");
					if ($arquivo) {
					    while (($linha = fgets($arquivo)) !== false) {
					        $info = explode(";", $linha);
	        				$array[] = $info[1] . "-" . $info[0];
					    }  
					}
					fclose($arquivo);
					sort($array);
				    $i = 0;
				    while (count($array) > $i) {
				    	$nova = explode("-", $array[$i]);
				    	echo "<option value=$nova[1]>" . $nova[0] . "</option>";
				    	$i++;
				    }
				?>
			</select>
			<select name="disciplina">
				<?php
					$array =  array();
					$arquivo = fopen("disciplinas.csv", "r");
					if ($arquivo) {
					    while (($linha = fgets($arquivo)) !== false) {
					        $info = explode(";", $linha);
	        				$array[] = $info[1]. "-" . $info[0];
					    }  
					}
					fclose($arquivo);
					sort($array);
				    $i = 0;
				    while (count($array) > $i) {
				    	$nova = explode("-", $array[$i]);
				    	echo "<option value=$nova[1]>" . $nova[0] . "</option>";
				    	$i++;
				    }
				?>
			</select>

			<br><br>
			<input type='submit' value='Matricular'>
		</form>
</body>
</html>