<?php

	include_once "Veiculo.class.php";

	class VeiculoDAO {

		private $con;
		
		function __construct() {
			$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
		}

		
		
	}


 ?>