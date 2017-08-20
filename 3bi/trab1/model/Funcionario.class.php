<?php
	class Funcionario {

		private $id;	
		private $nome;	
		private $login;
		private $senha;
		private $gerente;
			
		function __construct($id, $nome, $login, $senha, $gerente) {
			$this->id = $id;
			$this->nome = $nome;
			$this->login = $login;
			$this->senha = $senha;
			$this->gerente = $gerente;
		}
		
		function getId() {
			return $this->id;
		}
		
		function setId($id) {
			$this->id = $id;
		}

		function getNome() {
			return $this->nome; 
		}

		function setNome($nome) {
			$this->nome = $nome;
		}
		
		function getLogin() {
			return $this->login;
		}

		function setLogin($login) {
			$this->login = $login;
		}	

		function getSenha() {
			return $this->senha;
		}

		function setSenha($senha) {
			$this->senha = $senha;
		}

		function getGerente() {
			return $this->gerente;
		}

		function setGerente($gerente) {
			$this->gerente = $gerente;
		}

	}
 ?>