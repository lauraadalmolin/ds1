<?php

	include_once "Veiculo.class.php";

		class Carro extends Veiculo {

			function __construct($codigo, $modelo, $ano, $preco, $cor) {
				parent::__construct($codigo, $modelo, $ano, $preco, $cor);
			}
		
		}
 ?>