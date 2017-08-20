<?php

	include_once "Vaga.class.php";

	class VagaDAO {

		private $con;
		
		function __construct() {
			$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
		}

		function buscaVaga($s) {

			$sql = "SELECT codigo FROM vagas WHERE disponivel = TRUE AND codigo iLIKE '$s%' ORDER BY codigo LIMIT 1";

			$res = pg_query($this->con, $sql);

			$cod_vaga = -1;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$cod_vaga = $array["codigo"];
			}

			return $cod_vaga;
		}

		function getVaga($codigo) {

			$sql = "SELECT * FROM vagas WHERE codigo = '$codigo'";

			$res = pg_query($this->con, $sql);

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$codigo = $array["codigo"];
				$disponivel = $array["disponivel"];
				$id_vaga = $array["id_vaga"];
			}

			$vaga = new Vaga($codigo, $disponivel);
			$vaga->setIdVaga($id_vaga);
			return $vaga;
		
		}

		function getCodigos() {

			$sql = "SELECT codigo FROM vagas ORDER BY id_vaga";

			$res = pg_query($this->con, $sql);

			$codigos = [];

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$codigos[] = $array["codigo"];
			}
	
			return $codigos;
		
		}


		function getNumOcupadas() {
			
			$sql = "SELECT count (codigo) as ocupadas FROM vagas WHERE disponivel = false";

			$res = pg_query($this->con, $sql);
			$ocupadas = -1;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$ocupadas = $array["ocupadas"];
			}

			return $ocupadas;

		}

		function getNumTotal() {

			$sql = "SELECT count (codigo) as total FROM vagas";
			$res = pg_query($this->con, $sql);
			$total = -1;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$total = $array["total"];
			}
			return $total;
		}

	}


 ?>