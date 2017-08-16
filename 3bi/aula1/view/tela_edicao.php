<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
</head>
<body>
	<p>Edite aqui seu carro:</p>
	<form method="GET" action="../controller/salva_edicao.php">
		<?php
			echo $carro->getModelo();
		?>

		<p>Modelo: <input type="text" name="modelo" value='<?php echo $carro->getModelo();?>'></p>
		<p>Ano: <input type="text" name="ano" value='<?php echo $carro->getAno(); ?>'></p>
		<p>Preço(R$n.xx): <input type="text" name="preco" value='<?php echo $carro->getPreco(); ?>'></p>
		<p>Cor: <input type="text" name="cor" value='<?php echo $carro->getCor(); ?>'></p>
		<p><input type="hidden" name="codigo" value='<?php echo $carro->getCodigo(); ?>'></p>
		<input type="submit" value="Enviar">
	</form>	
	<br>
	<a href="view/consulta.php">Clique aqui para editar</a>
</body>
</html>