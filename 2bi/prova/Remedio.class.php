<?php

class Remedio {

	protected $id;
	protected $nome;
	protected $nome_f;
	protected $controlado;
	protected $quantidade;
	protected $preco;

	function __construct ($id, $nome, $nome_f, $controlado, $quantidade, $preco) {
		$this->id = $id;
		$this->nome = $nome;
		$this->nome_f = $nome_f;
		$this->controlado = $controlado;
		$this->quantidade = $quantidade;
		$this->preco = $preco;
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

	function getNomeF() {
		return $this->nome_f;
	}

	function setNomeF($nome_f) {
		$this->nome_f = $nome_f;
	}

	function getControlado() {
		return $this->controlado;
	}

	function setControlado($controlado) {
		$this->controlado = $controlado;
	}

	function getQuantidade() {
		return $this->quantidade;
	}

	function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}

	function getPreco() {
		return $this->preco;
	}

	function setPreco($preco) {
		$this->preco = $preco;
	}



}

?>