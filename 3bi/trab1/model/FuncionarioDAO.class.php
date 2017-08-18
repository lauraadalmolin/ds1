<?php 
	
include_once "Funcionario.class.php";

class FuncionarioDAO {

	private $con;
			
	function __construct() {
		$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
	}

	function isGerente($login) {

		$sql = "SELECT gerente FROM funcionarios WHERE login = '$login'";

		$retorno = pg_query($this->con, $sql);

		while ($row = pg_fetch_array($retorno)) {
			$gerente = $row["gerente"];
		}

		return $gerente;
	}

	function testaDados($login, $senha) {

		$sql = "SELECT * FROM funcionarios WHERE login = '$login' AND senha ='$senha'";

		$retorno = pg_query($this->con, $sql);

		while ($row = pg_fetch_array($retorno)) {
			return $row;
		}

	}

}


?>