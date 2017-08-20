<?php

	include_once "Veiculo.class.php";

		class Outro extends Veiculo {

			private $tipo;

			function __construct($placa, $marca, $modelo, $cor, $tipo) {
				parent::__construct($placa, $marca, $modelo, $cor);	
				$this->setTipo($tipo);
			}
			
			function setTipo($tipo) {
				$this->tipo = $tipo;
			}

			function getTipo() {
				return $this->tipo;
			}
		
		}
 ?>