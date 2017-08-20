<?php

	include_once "Veiculo.class.php";
	include_once "Carro.class.php";
	include_once "Moto.class.php";
	include_once "Outro.class.php";

	class VeiculoDAO {

		private $con;
		
		function __construct() {
			$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
		}

		function exists($placa) {

			$sql = "SELECT placa FROM veiculos WHERE placa = '$placa'";

			if (pg_num_rows(pg_query($this->con, $sql)) != 0) { 
				
				return true;

			} else {
				
				return false;

			}
		}
		
		function getVeiculo($placa) {

			$sql = "SELECT * FROM veiculos WHERE placa = '$placa'";

			$res = pg_query($this->con, $sql);

			$vaga = -1;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$placa = $array["placa"];
				$marca = $array["marca"];
				$modelo = $array["modelo"];
				$cor = $array["cor"];
				$tipo = $array["id_tipo"];
			}
			if ($tipo == 1) {
				$retorno = new Carro($placa, $marca, $modelo, $cor, $tipo);
			}
			if ($tipo == 2) {
				$retorno = new Moto($placa, $marca, $modelo, $cor, $tipo);
			}
			if ($tipo == 3) {
				$retorno = new Outro($placa, $marca, $modelo, $cor, $tipo);
			}
			return $retorno;
		
		}

		function salvaVeiculo($veiculo) {

			$modelo = $veiculo->getModelo();
			$placa = $veiculo->getPlaca();
			$tipo = $veiculo->getTipo();
			$marca = $veiculo ->getMarca();
			$cor = $veiculo->getCor();

			$sql = "INSERT INTO veiculos (placa, id_tipo, marca, modelo, cor) VALUES ('$placa', '$tipo', '$marca', '$modelo', '$cor')";

			if(pg_query($this->con, $sql) === false) {
				return 1;
			} else {
				return 2;
			}

		}


		
	
	}


 ?>