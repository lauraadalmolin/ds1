<?php
	class Registro {
		
		private $vaga;	
		private $veiculo;
		private $funcionario;
		private $horaEntrada;
		private $dataEntrada;
		private $dataSaida;
		private $horaSaida;
		
		function __construct($funcionario, $vaga, $veiculo, $horaEntrada, $dataEntrada, $dataSaida, $horaSaida) {
			$this->funcionario = $funcionario;
			$this->vaga = $vaga;
			$this->veiculo = $veiculo;
			$this->horaEntrada = $horaEntrada;
			$this->dataEntrada = $dataEntrada;
			$this->dataSaida = $dataSaida;
			$this->horaSaida = $horaSaida;
		}

		function getFuncionario() {
			return $this->funcionario;
		}

		function setFuncionario($funcionario) {
			$this->funcionario = $funcionario;
		}

		function getVaga() {
			return $this->vaga;
		}

		function setVaga($vaga) {
			$this->vaga = $vaga;
		}

		function getVeiculo() {
			return $this->veiculo;
		}
			
		function setVeiculo($veiculo) {
			$this->veiculo = $veiculo;
		}

		function getHoraEntrada() {
			return $this->horaEntrada;
		}

		function setHoraEntrada($horaEntrada) {
			$this->horaEntrada = $horaEntrada;
		}

		function getDataEntrada() {
			return $this->dataEntrada;
		}

		function setDataEntrada($dataEntrada) {
			$this->dataEntrada = $dataEntrada;
		}

		function getHoraSaida() {
			return $this->horaSaida;
		}

		function setHoraSaida($horaSaida) {
			$this->horaSaida = $horaSaida;
		}

		function getDataSaida() {
			return $this->dataSaida;
		}

		function setDataSaida($dataSaida) {
			$this->dataSaida = $dataSaida;
		}

	}
 ?>
