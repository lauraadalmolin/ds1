<?php
	class Vaga {

		private $codigo;	
		private $disponivel;
		
		function __construct($codigo, $disponivel) {
			$this->codigo = $codigo;
			$this->disponivel = $disponivel;
		}
		
		function getCodigo() {
			return $this->codigo;
		}
		
		function setCodigo($codigo) {
			$this->codigo = $codigo;
		}

		function getDisponivel() {
			return $this->disponivel; 
		}

		function setDisponivel($disponivel) {
			$this->disponivel = $disponivel;
		}
		
	}
 ?>