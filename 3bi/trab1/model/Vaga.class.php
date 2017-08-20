<?php
	class Vaga {

		private $codigo;	
		private $disponivel;
		private $id_vaga;
		
		function __construct($codigo, $disponivel) {
			$this->codigo = $codigo;
			$this->disponivel = $disponivel;
		}
		
		function getIdVaga() {
			return $this->id_vaga;
		}

		function setIdVaga($id_vaga) {
			$this->id_vaga = $id_vaga;
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