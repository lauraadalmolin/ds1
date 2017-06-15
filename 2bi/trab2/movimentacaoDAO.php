<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	function salva_movimentacao($tipo, $categoria, $efetivada, $data, $comentario, $id_u, $valor) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT saldo FROM usuarios WHERE id = '$id_u'";

		$res = pg_query($con, $sql);

		$saldo = -1;

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$saldo = $array["saldo"];
			
		}

		$novo_saldo = "a";
		
		if ($efetivada == "true") {
			
			if ($tipo == "receita") {
				
				$novo_saldo = $saldo + $valor;
			} else {
				$novo_saldo = $saldo - $valor;
			}
		}

		if ($novo_saldo !== "a") {
			
			$sql = "UPDATE usuarios SET saldo = '$novo_saldo' WHERE id = '$id_u'";

			$res = pg_query($con, $sql);
		
		} 

		$sql = "INSERT INTO movimentacoes (tipo, categoria, efetivada, data, comentario, id_u, valor) VALUES ('$tipo', '$categoria', '$efetivada', '$data', '$comentario', '$id_u', '$valor')";	

		$res = pg_query($con, $sql);
		
		pg_close($con);

		return $res;

	}

	function salva_movimentacao_id($tipo, $categoria, $efetivada, $data, $comentario, $id_u, $valor, $id_m) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT saldo FROM usuarios WHERE id = '$id_u'";

		$res = pg_query($con, $sql);

		$saldo = -1;

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$saldo = $array["saldo"];
		}

		$novo_saldo = "a";
	
		if ($efetivada == "true" || $efetivada == "SIM") {
			if ($tipo == "receita") {
				
				$novo_saldo = $saldo + $valor;
		;
			} else {
				$novo_saldo = $saldo - $valor;
			}
		}

		if ($novo_saldo !== "a") {
			
			$sql = "UPDATE usuarios SET saldo = '$novo_saldo' WHERE id = '$id_u'";
		
			$res = pg_query($con, $sql);
		
		} 

		$sql = "INSERT INTO movimentacoes (tipo, categoria, efetivada, data, comentario, id_u, valor, id_m) VALUES ('$tipo', '$categoria', '$efetivada', '$data', '$comentario', '$id_u', '$valor', '$id_m')";	

		$res = pg_query($con, $sql);
		
		pg_close($con);

		return $res;

	}

	function saldo($id) {
		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT saldo FROM usuarios WHERE id = '$id'";

		$res = pg_query($con, $sql);

		while(($array = pg_fetch_array($res)) !== FALSE) {
			return $array["saldo"];
		}
	}

	function buscaTodos($id) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT * FROM movimentacoes WHERE id_u = '$id' ORDER BY data";

		$res = pg_query($con, $sql);

		$return = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$id_m = $array["id_m"];
			$tipo = $array["tipo"];
			$valor = $array["valor"];
			$data = $array["data"];
			$efetivada = $array["efetivada"];
			$categoria = $array["categoria"];
			if ($efetivada == "t") {
				$efetivada = "SIM";
			} else {
				$efetivada = "NÃO";
			}
			$comentario = $array["comentario"];
			$temp = array("id_m" => $id_m, "tipo" => $tipo, "valor" => $valor, "data" => $data, "efetivada" => $efetivada, "comentario" => $comentario, "categoria" => $categoria);
			$return[] = $temp;
		}

		pg_close($con);

		return $return;

	}

	function busca($id_m) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT * FROM movimentacoes WHERE id_m = '$id_m' ORDER BY data";

		$res = pg_query($con, $sql);

		$return = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$id_m = $array["id_m"];
			$tipo = $array["tipo"];
			$valor = $array["valor"];
			$data = $array["data"];
			$efetivada = $array["efetivada"];
			$categoria = $array["categoria"];
			$comentario = $array["comentario"];
			$temp = array("id_m" => $id_m, "tipo" => $tipo, "valor" => $valor, "data" => $data, "efetivada" => $efetivada, "comentario" => $comentario, "categoria" => $categoria);
			
		}

		pg_close($con);

		return $temp;

	}

	function buscaMes($id, $month, $year) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "SELECT * FROM movimentacoes WHERE id_u = '$id' AND EXTRACT(year FROM data) = $year AND EXTRACT(month FROM data) = $month";

		$res = pg_query($con, $sql);

		$return = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$id_m = $array["id_m"];
			$tipo = $array["tipo"];
			$valor = $array["valor"];
			$data = $array["data"];
			$efetivada = $array["efetivada"];
			$categoria = $array["categoria"];
			if ($efetivada == "true" || $efetivada == "t") {
				$efetivada = "SIM";
			} else {
				$efetivada = "NÃO";
			}
			$comentario = $array["comentario"];
			$temp = array("id_m" => $id_m, "tipo" => $tipo, "valor" => $valor, "data" => $data, "efetivada" => $efetivada, "comentario" => $comentario, "categoria" => $categoria);
			$return[] = $temp;
		}

		pg_close($con);

		return $return;

	}

	function exclui($id_u, $id_m, $valor, $efetivada, $tipo) {

		$con = pg_connect("host=localhost user=postgres password=1234 dbname=financas");

		$sql = "DELETE FROM movimentacoes WHERE id_u = '$id_u' AND id_m = '$id_m'";

		$res = pg_query($con, $sql);

		$novo_saldo = "a";
		if ($efetivada == "true" || $efetivada == "t") {
			$saldo = -1;

			$sql = "SELECT saldo FROM usuarios WHERE id = '$id_u'";

			$res = pg_query($con, $sql);


			while(($array = pg_fetch_array($res)) !== FALSE) {
				$saldo = $array["saldo"];
			}			
			if ($tipo == "receita") {				
				$novo_saldo = $saldo - $valor;
			} else {
				$novo_saldo = $saldo + $valor;
			}
		}

		if ($novo_saldo !== "a") {
	
			$sql = "UPDATE usuarios SET saldo = '$novo_saldo' WHERE id = '$id_u'";

			$res = pg_query($con, $sql);
		}

		
		pg_close($con);

		return $res;

	}

	function edita($id_u, $id_m, $comentario, $data, $efetivada, $categoria, $valor, $tipo) {

		$obj = busca($id_m);
		exclui($id_u, $id_m, $obj["valor"], $obj["efetivada"], $obj["tipo"]);
		salva_movimentacao_id($tipo, $categoria, $efetivada, $data, $comentario, $id_u, $valor, $id_m);

	}
	



?>