<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="cadastro.php">
		Nome
		<input type="text" name="nome"><br><br>
		E-mail
		<input type="text" name="email"><br><br>
		Senha
		<input type="text" name="senha"><br><br>
		CPF
		<input type="text" name="cpf"><br><br>
		Idade
		<input type="number" name="idade"><br><br>
		Feminino
		<input type="radio" name="sexo" value="Feminino"><br><br>
		Masculino
		<input type="radio" name="sexo" value="Masculino"><br><br>
		Cidade
		<input type="text" name="cidade"><br><br>
		Estado
		<select name="estado">
		  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
		  <option value="Santa Catarina">Santa Catarina</option>
		  <option value="Parana">Paraná</option>
		</select>
		<br><br>
		<input type='submit' value='Enviar'>
	</form>


</body>
</html>