<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include "Remedio.class.php";

	function salva_remedio($remedio) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$nome = $remedio->getNome();
		$nome_f = $remedio->getNomeF();
		$controlado = $remedio->getControlado();
		$quantidade = $remedio->getQuantidade();
		$preco = $remedio->getPreco();

		$sql = "INSERT INTO medicamentos (nome, nome_f, controlado, quantidade, preco) VALUES ('$nome', '$nome_f', '$controlado', '$quantidade', '$preco')";	

		$res = pg_query($con, $sql);
		
		pg_close($con);

		return $res;

	}

	function buscaTodos() {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos ORDER BY nome";

		$res = pg_query($con, $sql);

		$remedios = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {

			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];			
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);
			$remedios[] = $remedio;

		}

		pg_close($con);

		return $remedios;

	}

	function buscaNome($pnome) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos WHERE nome ILIKE '%$pnome%' ORDER BY nome";

		$res = pg_query($con, $sql);

		$remedios = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {

			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];			
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);
			$remedios[] = $remedio;

		}

		pg_close($con);

		return $remedios;

	}


	function buscaControlados() {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos WHERE controlado = TRUE ORDER BY nome";

		$res = pg_query($con, $sql);

		$remedios = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {

			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];			
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);
			$remedios[] = $remedio;

		}

		pg_close($con);

		return $remedios;

	}

	function buscaEstoqueBaixo() {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos WHERE quantidade < 5 ORDER BY nome";

		$res = pg_query($con, $sql);

		$remedios = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {

			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];			
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);
			$remedios[] = $remedio;

		}

		pg_close($con);

		return $remedios;

	}

	function buscaFornecedor($fnome) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos WHERE nome_f LIKE '$fnome' ORDER BY nome";

		$res = pg_query($con, $sql);

		$remedios = array();

		while(($array = pg_fetch_array($res)) !== FALSE) {

			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];			
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);
			$remedios[] = $remedio;

		}

		pg_close($con);

		return $remedios;

	}

	function busca($id_m) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "SELECT * FROM medicamentos WHERE id_m = '$id_m' ORDER BY nome";

		$res = pg_query($con, $sql);

		while(($array = pg_fetch_array($res)) !== FALSE) {
			$id_m = $array["id_m"];
			$nome = $array["nome"];
			$nome_f = $array["nome_f"];
			$controlado = $array["controlado"];
			$quantidade = $array["quantidade"];
			$preco = $array["preco"];
			$remedio = new Remedio($id_m, $nome, $nome_f, $controlado, $quantidade, $preco);	
		}

		pg_close($con);

		return $remedio;

	}

	function exclui($id_m) {

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "DELETE FROM medicamentos WHERE id_m = '$id_m'";

		$res = pg_query($con, $sql);

		pg_close($con);

		return $res;

	}

	function edita($remedio) {

		$id_m = $remedio->getId();
		$nome = $remedio->getNome();
		$nome_f = $remedio->getNomeF();
		$controlado = $remedio->getControlado();
		$quantidade = $remedio->getQuantidade();
		$preco = $remedio->getPreco();

		$con = pg_connect("host=localhost user=postgres password=postgres dbname=farmacia");

		$sql = "UPDATE medicamentos SET nome = '$nome', nome_f = '$nome_f', controlado = '$controlado', quantidade = '$quantidade', preco = '$preco' WHERE id_m = '$id_m'";

		$res = pg_query($con, $sql);

		pg_close($con);

		return $res;

		

	}
	



?>