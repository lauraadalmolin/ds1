<?php
	
class Circulo extends Ponto {

		protected $raio;

		function __construct($x, $y, $raio) {
			$this->setX($x);
			$this->setY($y);
			$this->raio = $raio;
		}

		function getRaio() {
			return $this->raio;
		}

		function setRaio($raio) {
			$this->raio = $raio;
		}

		function areaCirculo() {
			return 3.14 * $this->raio * $this->raio;
		}

}

?>