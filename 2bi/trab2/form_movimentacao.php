<html>
<head>
	<title>Nova Movimentação</title>
</head>
<body>
<?php
	session_start();
	if (!$_SESSION["logado"] == true) {
		header("location:erro_login.php");
	}
?>
	<h1>Insira os dados da movimentação em questão</h1>
	<form method='post' action='salva_movimentacao.php'>
		<input type='radio' name='tipo' value='Receita'> Receita 
		<input type='radio' name='tipo' value='Despesa'> Despesa <br>
		<select name='categoria'>
			<option value="Alimentação">Alimentação</option>
			<option value="Supermercado">Supermercado</option>
			<option value="Gasolina">Gasolina</option>
			<option value="Roupas">Roupas</option>
			<option value="Remédios">Remédios</option>
			<option value="Outros">Outros</option>
		</select> <br>
		<input type='radio' name='efetivada' value='true'> Efetivada 
		<input type='radio' name='efetivada' value='false'> Não efetivada <br>
		<input type='text' name='data' placeholder="Data da movimentação"> <br>
		<input type='text' name='comentario' placeholder="Comentário (opcional)"> <br>
		<input type='submit'>
	</form>
</body>
</html>