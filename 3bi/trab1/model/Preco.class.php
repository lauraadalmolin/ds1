<?php
	class Preco {

		private $preco_carro;
		private $preco_moto;
		private $preco_outro;
		private $preco_pernoite;
		private $preco_diaria;

		function __construct($preco_carro, $preco_moto, $preco_outro, $preco_pernoite, $preco_diaria) {
			$this->preco_carro = $preco_carro;
			$this->preco_outro = $preco_outro;
			$this->preco_moto = $preco_moto;
			$this->preco_pernoite = $preco_pernoite;
			$this->preco_diaria = $preco_diaria;
		}

		function getPrecoCarro() {
			return $this->preco_carro;
		}

		function setPrecoCarro($preco_carro) {
			$this->preco_carro = $preco_carro;
		}

		function getPrecoOutro() {
			return $this->preco_outro;
		}

		function setPrecoOutro($preco_outro) {
			$this->preco_outro = $preco_outro;
		}

		function getPrecoMoto() {
			return $this->preco_moto;
		}

		function setPrecoMoto($preco_moto) {
			$this->preco_moto = $preco_moto;
		}

		function getPrecoPernoite() {
			return $this->preco_pernoite;
		}

		function setPrecoPernoite($preco_pernoite) {
			$this->preco_pernoite = $preco_pernoite;
		}

		function getPrecoDiaria() {
			return $this->preco_diaria;
		}

		function setPrecoDiaria($preco_diaria) {
			$this->preco_diaria = $preco_diaria;
		}
		
		
	}
 ?>