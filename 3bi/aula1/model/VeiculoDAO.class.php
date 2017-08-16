<?php
	include_once "Veiculo.class.php";

	class VeiculoDAO {
		private $conexao;
		
		function __construct() {
			$this->conexao = pg_connect("host=localhost user=postgres password=postgres dbname=revenda");
		}

		function consulta($modelo, $ano) {
			$filtro = "";
			if($modelo !== NULL)
				$filtro .= " modelo LIKE '%$modelo%'";
			if($modelo !== NULL && $ano !== NULL)
				$filtro .= " AND "; 
			if($ano !== NULL) 
				$filtro .= " ano = $ano";
			$sql = "SELECT * FROM carros";
			if($filtro != "")
				$sql .= " WHERE".$filtro." ORDER BY codigo";
			$result = pg_query($this->conexao, $sql);
			$lista = array();
			if($result) {
				while($linha = pg_fetch_assoc($result)) {
					$lista[] = new Veiculo($linha['codigo'],
										   $linha['modelo'],
										   $linha['ano'],
										   $linha['preco'],
										   $linha['cor']);
				}
			}
			return $lista;
		}

		function geraCodigo() {

			$sql = "SELECT codigo FROM carros ORDER BY codigo DESC LIMIT 1";

			$res = pg_query($this->conexao, $sql);

			$codigo = 0;

			while(($array = pg_fetch_array($res)) !== FALSE) {
				$codigo = $array["codigo"];
			}

			return $codigo +1;

		}


		function insere($modelo, $ano, $preco, $cor) {

			$codigo = $this->geraCodigo();

			$sql = "INSERT INTO carros (codigo, modelo, ano, preco, cor) VALUES ('$codigo', '$modelo', '$ano', '$preco', '$cor')";	

			$res = pg_query($this->conexao, $sql);

			return $res;
		}

		function exclui($codigo) {

			$sql = "DELETE FROM carros WHERE codigo = '$codigo'";	

			$res = pg_query($this->conexao, $sql);

		}

		function busca($codigo) {

			$sql = "SELECT * FROM carros WHERE codigo = $codigo";

			$result = pg_query($this->conexao, $sql);

			while(($array = pg_fetch_array($result)) !== FALSE) {
				$codigo = $array["codigo"];
				$modelo = $array["modelo"];
				$cor = $array["cor"];
				$ano = $array["ano"];
				$preco = $array["preco"];
			}

			$carro = new Veiculo($codigo,$modelo,$ano,$preco,$cor);

			return $carro;
			
		}
		
		function edita($codigo, $modelo, $ano, $preco, $cor) {

			$sql = "UPDATE carros SET modelo='$modelo', ano=$ano, preco=$preco, cor='$cor' WHERE codigo=$codigo";

			$result = pg_query($this->conexao, $sql);

		}
	}


 ?>