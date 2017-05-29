<?php

	/*
		Toda conta tem um número e um saldo (um valor em reais). Para toda conta se pode realizar depósitos,
		saques e transferências. Em um depósito, o saldo da conta será aumentado em uma determinada quantia
		em reais, passada como parâmetro. Em uma transferência, uma certa quantia será sacada da conta e
		depositada em outra conta (a quantia e a outra conta devem ser passadas como parâmetro). O saque vai
		depender do tipo de conta:
		• Contas poupança: O saque só será permitido se a quantia a ser sacada não exceder o saldo.
		• Contas corrente: A conta terá um limite, que é um atributo deste tipo de conta. O saque só será
		permitido se o novo saldo (resultado no saldo atual menos a quantia sacada) for maior do que o
		limite multiplicado por -1.
		Crie métodos get e set para todos os atributos de todas as classes ou utilize os métodos interceptores.
		Implemente uma aplicação PHP que crie algumas contas poupança e correntes e as coloque em um
		vetor. Use como chaves desse vetor o número das contas. A aplicação deve permitir que o usuário faça
		saques, depósitos e transferências entre contas.
	*/
	class ContaCorrente extends Conta {

		protected $limite;

		function __construct ($numero, $saldo, $limite) {
			$this->setSaldo($saldo);
			$this->setNumero($numero);
			$this->limite = $limite;
		}

		function saque($quantia) {	
			if(($this->saldo - $quantia) > ($this->limite * -1)) {
				$this->saquePadrao($quantia);
			}			
		}

		// função depósito é herdada de Conta

		function getLimite() {
			return $this->limite;
		}

		function setLimite($limite) {
			$this->limite = $limite;
		}

	}

?>