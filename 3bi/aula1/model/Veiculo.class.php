<?php
	class Veiculo {
		private $codigo;
		private $modelo;
		private $ano;
		private $preco;
		private $cor;
		
		function __construct($codigo, $modelo, $ano, $preco, $cor) {
			$this->codigo = $codigo;
			$this->modelo = $modelo;
			$this->ano = $ano;
			$this->preco = $preco;
			$this->cor = $cor;
		}
		
		function getCodigo() {	return $this->codigo; }
		
		function getModelo() {	return $this->modelo; }
		
		function getAno() { return $this->ano; }
		
		function getPreco() { return $this->preco; }
		
		function getCor() {	return $this->cor; }
	}
 ?>