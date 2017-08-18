<?php

	include_once "Registro.class.php";

	class RegistroDAO {

		private $con;
		
		function __construct() {
			$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
		}

		

		
		

	}


 ?>