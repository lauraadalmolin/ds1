<?php

	include_once "Registro.class.php";
	include_once "VagaDAO.class.php";
	include_once "VeiculoDAO.class.php";

	class RegistroDAO {

		private $con;
		
		function __construct() {
			$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
		}

		function getRegistro($veiculo, $funcionario) {

			$placa = $veiculo->getPlaca();

			$sql = "SELECT * FROM registros WHERE placa = '$placa' AND saida IS NULL";

			$res = pg_query($this->con, $sql);

			$vagaDAO = new VagaDAO();

			$vaga = null;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$vaga = $vagaDAO->getVaga($array["id_vaga"]);
			}

			$registro = new Registro($funcionario, $vaga, $veiculo, null, null, null, null);
			
			return $registro;
		
		}

		function procuraNoEstacionamento($veiculo) {

			$placa = $veiculo->getPlaca();

			$sql = "SELECT placa FROM registros WHERE saida IS NULL AND placa ='$placa'";
			
			if (pg_num_rows(pg_query($this->con, $sql)) == 0) { 
				return false;
			} else {
				return true;
			}
		}

		function salvaEntrada($registro) {

			$data = $registro->getDataEntrada();
			$hora = $registro->getHoraEntrada();
			$timestamp = $data . " " . $hora;

			$vagaDAO = new VagaDAO();
			$tipo = $registro->getVeiculo()->getTipo();
			if ($tipo == 1) {
				$vaga = $vagaDAO->buscaVaga("C");
			} 
			if ($tipo == 2) {
				$vaga = $vagaDAO->buscaVaga("M");
			} 
			if ($tipo == 3) {
				$vaga = $vagaDAO->buscaVaga("O");
			}

			if ($vaga != -1 && $this->procuraNoEstacionamento($registro->getVeiculo()) == false) {
				$placa = $registro->getVeiculo()->getPlaca();
				$funcionario = $registro->getFuncionario()->getId();
				$sql = "INSERT INTO registros (entrada, id_vaga, placa, id_funcionario) VALUES ('$timestamp', '$vaga', '$placa', '$funcionario')";
				$res = pg_query($this->con, $sql);
				if ($res != false) {
					$sql = "UPDATE vagas SET disponivel = FALSE WHERE codigo = '$vaga'";
					$res = pg_query($this->con, $sql);
					// Fez o check-in
					return 1;
				} else {
					return 2;
				}
			} else {
				if ($vaga == -1) {
					return 3;
				} else {
					return 4;
				}
				
			}
		}

		function validaData($timestamp, $placa) {

			$sql = "SELECT EXTRACT (EPOCH FROM '$timestamp'::TIMESTAMP)/3600 - EXTRACT (EPOCH FROM entrada)/3600 as value FROM registros WHERE placa = '$placa' AND saida IS NULL";
			$res = pg_query($this->con, $sql);
			
			while(($array = pg_fetch_array($res)) !== FALSE) {
				$value = $array["value"];
				
				if ($value < 0) {
					return 1;
				} else {
					return 2;
				}
			}

		}

		function salvaSaida($registro) {

			$data = $registro->getDataSaida();
			$hora = $registro->getHoraSaida();
			$timestamp = $data . " " . $hora;

			$placa = $registro->getVeiculo()->getPlaca();
			
			// validar $timestamp: deve ser maior que a $entrada

			$sql = "SELECT placa FROM registros WHERE placa = '$placa' AND saida IS NULL";
			$res = pg_query($this->con, $sql);
			$placa2 = "";

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$placa2 = $array["placa"];
			}

			if($placa2 != "") {

				$sql = "SELECT id_vaga, entrada FROM registros WHERE saida IS NULL AND placa LIKE '$placa'";
				$res = pg_query($this->con, $sql);
				$vaga = -1;
				$entrada = "";

				while(($array = pg_fetch_array($res)) !== FALSE) {
					$vaga = $array["id_vaga"];
					$entrada = $array["entrada"];
				}

				$ret = $this->validaData($timestamp, $placa);
				
				if ($ret == 1) {
					return 1;
				} else {

					$sql = "UPDATE registros SET saida = '$timestamp' WHERE saida IS NULL AND placa = '$placa'";
					$res = pg_query($this->con, $sql);

					if ($res != false) {

						$sql = "UPDATE vagas SET disponivel = TRUE WHERE codigo = '$vaga'";
						$res = pg_query($this->con, $sql);
					}
					return 2;
					//echo "<div class='alert alert-warning' role='alert'>Preço a pagar: R$". calcula_preco($entrada, $placa) ."</div>";
				}

			} else {
				return 3;
			}
		}


		function calculaPreco($registro) {

			$sql = "SELECT * FROM precos";

			$res = pg_query($this->con, $sql);

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$preco_carro = $array["preco_carro"];
				$preco_moto = $array["preco_moto"];
				$preco_outro = $array["preco_outro"];
				$preco_pernoite = $array["preco_pernoite"];
				$preco_diaria = $array["preco_diaria"];
			}

			$data = $registro->getDataSaida();
			$hora = $registro->getHoraSaida();
			$timestamp = $data . " " . $hora;

			$placa = $registro->getVeiculo()->getPlaca();

			$sql = "SELECT (EXTRACT(EPOCH FROM saida) - EXTRACT(EPOCH FROM entrada))/3600 as value, EXTRACT(HOUR FROM entrada) as entrada, EXTRACT(HOUR FROM saida) as saida  FROM registros WHERE placa = '$placa' AND saida = '$timestamp'";
			
			$res = pg_query($this->con, $sql);

			$n = 0;
			$entrada = 0;
			$saida = 0;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$n = $array["value"];
				$entrada = $array["entrada"];
				$saida = $array["saida"];
			}
			if ($n > 12) {						
				$dias = ceil($n/24);
				return $dias * $preco_diaria;
			} else {
				if ($entrada >= 20 && $saida <= 8) {
					return $preco_pernoite;
				} else {
					$sql = "SELECT id_tipo FROM veiculos WHERE placa = '$placa'";
					$res = pg_query($this->con, $sql);
					$tipo = -1;
					while(($array = pg_fetch_array($res)) !== FALSE) {
						$tipo = $array["id_tipo"];
					}
					if ($tipo == 1) {
						return $n * $preco_carro;
					}
					if ($tipo == 2) {
						return $n * $preco_moto;
					}
					if ($tipo == 3) {
						return $n * $preco_outro;
					}
				}
			}
		}

		function buscaRegistros() {

			$sql = "SELECT v.id_vaga, r.placa, r.entrada, r.id_vaga as codigo FROM registros r INNER JOIN vagas v ON (r.id_vaga = v.codigo)  WHERE r.saida IS NULL ORDER BY v.id_vaga";

			$res = pg_query($this->con, $sql);

			$registros = array();

			$vagaDAO = new VagaDAO();
			$veiculoDAO = new VeiculoDAO();

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$id_vaga = $array["id_vaga"];
				$codigo = $array["codigo"];
				$placa = $array["placa"];
				$entrada = $array["entrada"];
				$vaga = $vagaDAO->getVaga($codigo);
				$veiculo = $veiculoDAO->getVeiculo($placa);
				$registro = new Registro(null, $vaga, $veiculo, $entrada, null, null, null); 
				$registros[] = $registro;
			}	
			return $registros;
		}
		

		
		

	}


 ?>