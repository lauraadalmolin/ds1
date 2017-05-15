<!DOCTYPE html>
<html>
<head>
	<title>Exercício 2</title>
</head>
<body>
	<?php
		$alunos = array(0 => array("matricula" => "11030235", "nome" => "Laura Dalmolin", 
										 "e-mail" => "laura.aguiar.dalmolin@gmail.com", "ano" => 2014),
						1 => array("matricula" => "11030221", "nome" => "Victor Hechel",
										 "e-mail" => "victor.hechel@gmail.com", "ano" => 2014),
						2 => array("matricula" => "11030209", "nome" => "Laura Gomes",
										 "e-mail" => "lauratellesgomes@hotmail.com", "ano" => 2014));
		$matricula = $_POST["matricula"];
		$existe = false;
		for ($i=0; $i < count($alunos); $i++) { 
			if($alunos[$i]["matricula"] == $matricula) {
				$existe = true;
				echo "<p> Matrícula: " . $matricula ."</p><br>";
				echo "<p> Nome: " . $alunos[$i]["nome"] . "</p><br>";
				echo "<p> E-mail: " . $alunos[$i]["e-mail"] . "</p></br>";
				echo "<p> Ano: " . $alunos[$i]["ano"] . "</p></br>"; 
			}
		}

		if($existe == false) echo "<p> Usuário não cadastrado </p>";
	?>

</body>
</html>


