<html>
	<head>
		<title>Aula 18 - Exemplo 1</title>
	</head>
	<body>
		<h1>Veículos consultados:</h1>
		<table border="1">
			<tr>
				<th>Código</th>
				<th>Modelo</th>
				<th>Ano</th>
				<th>Preço</th>
				<th>Cor</th>
				<th></th>
				<th></th>
			</tr>
			<?php
				$lista = $_DADOS["veiculos"];
				foreach($lista as $v) { ?>
					<tr>
						<td><?php echo $v->getCodigo(); ?></td>
						<td><?php echo $v->getModelo(); ?></td>
						<td><?php echo $v->getAno(); ?></td>
						<td><?php echo $v->getPreco(); ?></td>
						<td><?php echo $v->getCor(); ?></td>
						<td><a href='exclui.php?codigo=<?php echo $v->getCodigo();?>'>Excluir</a></td>
						<td><a href='edita.php?codigo=<?php echo $v->getCodigo();?>'>Editar</a></td>
					</tr>
				<?php
				}
			 ?>
		</table>
		<a href="../view/consulta.php">VOLTAR</a>
	</body>
</html>