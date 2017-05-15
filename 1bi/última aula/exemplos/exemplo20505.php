<?php
	
	$nome = trim($_POST["nome"]);
	$con = pg_connect("host=localhost user=postgres password=postgres dbname=info");

	$sql = "SELECT * FROM disciplinas WHERE nome ILIKE '%$nome%' ORDER BY nome";
	$res = pg_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mostra Disciplinas</title>
</head>
<body>
	<table>
		<tr>
			<th>Código</th>
			<th>Nome</th>
			<th>Semestre</th>
			<th>Professor</th>
		</tr>
		<?php
			
			while(($array = pg_fetch_array($res)) !== FALSE) {

		?>
		<tr>
			<?php echo "<td>".$array["codigo"]. "</td>"; ?>
			<td><?php echo $array["nome"]; ?></td>
			<td><?php echo $array["semestre"]; ?></td>
			<td><?php echo $array["professor"]; ?></td>
		</tr>
		<?php

			}

		?>
	</table>

</body>
</html>