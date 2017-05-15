<?php
	
	$codigo = trim($_POST["codigo"]);
	$con = pg_connect("host=localhost user=postgres password=1234 dbname=filmes");

	$sql = "SELECT * FROM filmes";
	$res = pg_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mostra Disciplinas</title>
	<meta charset="utf-8">
</head>
<body>
	<table>
		<tr>
			<th>Código</th>
			<th>Título</th>
			<th>Duração</th>
			<th>Sinopse</th>
		</tr>
		<?php
			
			while(($array = pg_fetch_array($res)) !== FALSE) {

		?>
		<tr>
			<?php echo "<td>".$array["codigo"]. "</td>"; ?>
			<td><?php echo $array["titulo"]; ?></td>
			<td><?php echo $array["duracao"]; ?></td>
			<td><?php echo $array["sinopse"]; ?></td>
		</tr>
		<?php

			}

		?>
	</table>

</body>
</html>