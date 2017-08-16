<?php
	include_once "Veiculo.class.php";
	include_once "VeiculoDAO.class.php";
	
	class VeiculoRN {
		private $dao;
		
		function __construct() {
			$this->dao = new VeiculoDAO();
		}
		
		function consulta($modelo, $ano) {
			return $this->dao->consulta($modelo, $ano);
		}

		function insere($modelo, $ano, $preco, $cor) {
			$this->dao->insere($modelo, $ano, $preco, $cor);
		}

		function exclui($codigo) {
			$this->dao->exclui($codigo);
		}

		function busca($codigo) {
			return $this->dao->busca($codigo);
		}

		function edita($codigo, $modelo, $ano, $preco, $cor) {
			$this->dao->edita($codigo, $modelo, $ano, $preco, $cor);
		}
	}

 ?>