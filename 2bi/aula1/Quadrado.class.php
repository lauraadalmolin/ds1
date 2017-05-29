<?php 

class Quadrado {

	var $lado;

	function area() {
		return $this->lado * $this->lado;
	}

	function perimetro() {
		return $this->lado * 4;
	}

	function diagonal() {
		return $this->lado * sqrt(2);
	}


}

?>