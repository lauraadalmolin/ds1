<?php

class Carro {
	// ATRIBUTOS
	private $cor = "Branco";
	private $ano = 2012;
	private $fabricante = "Etec";
	private $velocidade = 0;

	// MÉTODOS 
	function acelerar() {
		$this->velocidade += 5;
	}

	function frear() {
		if($this->velocidade > 5) {
			$this->velocidade -= 5;
		} else {
			$this->velocidade = 0;
		}
	}

	function getCor() {
		return $this->cor;
	}

	function setCor($c) {
		$this->cor = $c;
	}

	function getAno() {
		return $this->ano;
	}

	function setAno($a) {
		$this->ano = $a;
	}

	function getFabricante() {
		return $this->fabricante;
	}

	function setFabricante($f) {
		$this->fabricante = $f;
	}

	function getVelocidade() {
		return $this->velocidade;
	}

	function setVelocidade($v) {
		$this->velocidade = $v;
	}


}
?>