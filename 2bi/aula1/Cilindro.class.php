<?php
	
class Cilindro extends Circulo {

	private $altura;

	function __construct($x, $y, $raio, $altura) {
		$this->setX($x);
		$this->setY($y);
		$this->setRaio($raio);
		$this->altura = $altura;
	}

	function getAltura() {
		return $this->altura;
	}

	function setAltura($altura) {
		$this->altura = $altura;
	}

	function areaCilindro() {
		return $this->areaCirculo($this->getRaio()) * 2 + (2 * 3.14 * $this->getRaio() * $this->altura);
	}

	function volumeCilindro() {
		return $this->areaCirculo($this->getRaio()) * $this->altura;
	}

}

?>