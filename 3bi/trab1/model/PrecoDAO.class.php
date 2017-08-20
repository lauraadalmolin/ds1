<?php
include_once "Preco.class.php";

class PrecoDAO {

	private $con;
			
	function __construct() {
		$this->con = pg_connect("host=localhost user=postgres password=postgres dbname=estacionamento");
	}

	function getPrecos() {
		
		$sql = "SELECT * FROM precos";

		$retorno = pg_query($this->con, $sql);

		while ($row = pg_fetch_array($retorno)) {
			$preco_carro = $row["preco_carro"];
			$preco_moto = $row["preco_moto"];
			$preco_outro = $row["preco_outro"];
			$preco_pernoite = $row["preco_pernoite"];
			$preco_diaria = $row["preco_diaria"];
		}

		$preco = new Preco($preco_carro, $preco_moto, $preco_outro, $preco_pernoite, $preco_diaria);
		
		return $preco;
	}

	function alteraPrecos($preco) {

		$preco_carro = $preco->getPrecoCarro();
		$preco_moto = $preco->getPrecoMoto();
		$preco_outro = $preco->getPrecoOutro();
		$preco_pernoite = $preco->getPrecoPernoite();
		$preco_diaria = $preco->getPrecoDiaria();


		$sql = "UPDATE precos SET preco_carro = $preco_carro, preco_moto = $preco_moto, preco_outro = $preco_outro, preco_pernoite = $preco_pernoite, preco_diaria = $preco_diaria";

		$res = pg_query($this->con, $sql);

	}

}

?>