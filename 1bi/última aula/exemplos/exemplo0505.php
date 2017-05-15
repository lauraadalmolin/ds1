<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Cadastro de disciplina</title>
</head>
<body>
	<br>	
	<div class='center_align micro_div center'>
		<h1 class='big_title'>Cadastrar Disciplina</h1>
		<form method="post" action="salva_cadastro.php">
				
			<input type="text" name="nome" placeholder="Nome"><br><br>			
			<input type="number" name="semestre" placeholder="Semestre"><br><br>
			<input type="text" name="professor" placeholder="Professor"><br><br>
			<input type='submit' value='Enviar'>
		</form>
	</div>
</body>
</html>