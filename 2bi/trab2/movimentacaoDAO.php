<?php
	
	function salva_movimentacao($tipo, $categoria, $efetivada, $data, $comentario) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=financas");

		// procurar o id referente ao tipo no banco

		// procurar o id referente ao categoria no banco


		/*$sql = "SELECT id_vaga FROM vagas WHERE disponivel = TRUE ORDER BY id_vaga LIMIT 1";

		$res = pg_query($con, $sql);

		$vaga = -1;

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$vaga = $array["id_vaga"];

		}

		if ($vaga != -1) {
			
			$sql = "INSERT INTO registros (entrada, id_vaga, placa) VALUES ('$timestamp', '$vaga', '$placa')";
			$res = pg_query($con, $sql);
			$sql = "UPDATE vagas SET disponivel = FALSE WHERE id_vaga = '$vaga'";
			$res = pg_query($con, $sql);
			pg_close($con);
			echo "<div class='alert alert-success' role='alert'>Check-in realizado com sucesso!</div>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Desculpe, mas o estacionamento está lotado.</div>";
		}

		*/

	}

	



?>