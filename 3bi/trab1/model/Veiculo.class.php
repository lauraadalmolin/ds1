<?php
	class Veiculo {

		private $placa;	
		private $marca;
		private $modelo;
		private $cor;
		
		function __construct($codigo, $modelo, $ano, $preco, $cor) {
			$this->placa = $placa;
			$this->marca = $marca;
			$this->modelo = $modelo;
			$this->cor = $cor;
		}
		
		function getPlaca() {
			return $this->placa;
		}
		
		function setPlaca($placa) {
			$this->placa = $placa;
		}

		function getMarca() {
			return $this->marca; 
		}

		function setMarca($marca) {
			$this->marca = $marca;
		}
		
		function getModelo() {
			return $this->modelo;
		}

		function setModelo($modelo) {
			$this->modelo = $modelo;
		}	

		function getCor() {
			return $this->cor;
		}

		function setCor($cor) {
			$this->cor = $cor;
		}

	}
 ?>