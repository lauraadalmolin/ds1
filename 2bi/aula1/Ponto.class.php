<?php

Class Ponto {
	
	protected $x;
	protected $y;

	function  __construct($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}

	function setX($x) {
		$this->x = $x;
	}

	function getX() {
		return $this->x;
	}

	function setY($y) {
		$this->y = $y;
	}

	function getY() {
		return $this->y;
	}

}
?>