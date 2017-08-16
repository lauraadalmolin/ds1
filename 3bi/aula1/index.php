<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
</head>
<body>
	<p>Insira aqui um carro:</p>
	<form method="GET" action="controller/insere.php">
		<p>Modelo: <input type="text" name="modelo"></p>
		<p>Ano: <input type="text" name="ano"></p>
		<p>Preço(R$n.xx): <input type="text" name="preco"></p>
		<p>Cor: <input type="text" name="cor"></p>
		<input type="submit" value="Inserir">
	</form>	
	<br>
	<a href="view/consulta.php">Clique aqui para consultar</a>
</body>
</html>
