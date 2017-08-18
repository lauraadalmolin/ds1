<?php
	class Registro {
		
		private $placa;	
		private $veiculo;
		private $horaEntrada;
		private $dataEntrada;
		private $dataSaida;
		private $horaSaida;
		
		function __construct($placa, $veiculo, $horaEntrada, $dataEntrada, $dataSaida, $horaSaida) {
			$this->placa = $placa;
			$this->veiculo = $veiculo;
			$this->horaEntrada = $dataEntrada;
			$this->dataSaida = $dataSaida;
			$this->horaSaida = $horaSaida;
		}

		function getPlaca() {
			return $this->placa;
		}

		function setPlaca($placa) {
			$this->placa = $placa;
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

		function getDataEntrada($dataEntrada) {
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

		function getDataSaida($dataSaida) {
			return $this->dataSaida;
		}

		function setDataEntrada($dataSaida) {
			$this->dataSaida = $dataSaida;
		}

	}
 ?>
