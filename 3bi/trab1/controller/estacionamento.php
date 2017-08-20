<?php
	include_once "../model/VagaDAO.class.php";
	include_once "../model/RegistroDAO.class.php";
	
	//error_reporting(E_ALL);
	//ini_set('display_errors', 'On');

	session_start();

	if (!$_SESSION["logado"] == true) {
		header("location:../index.php");
	}

	$vagaDAO = new VagaDAO();
	$ocupadas = $vagaDAO->getNumOcupadas();	
	$total = $vagaDAO->getNumTotal();
	$mensagem = "";

	if ($ocupadas != 14) {
		$mensagem = $mensagem . "<div class='alert alert-info' role='alert'>Vagas ocupadas: " . $ocupadas . "</div>";
		$mensagem = $mensagem . "<div class='alert alert-info' role='alert'>Vagas livres: " . ($total - $ocupadas) . "</div><br>";				
	} else {
		$mensagem = $mensagem . "<div class='alert alert-warning' role='alert'>Desculpe, mas o estacionamento está lotado.</div><br>";
	}

	$mensagem = $mensagem . "</div></div><div class='row'>";

	$informacoes = array(1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => "", 8 => "", 9 => "", 10 => "", 11 => "", 12 => "", 13 => "", 14 => "");

	$registroDAO = new RegistroDAO();
	$registros = $registroDAO->buscaRegistros();
	$ids = [];
	$codigos = [];
	$placas = [];
	$entradas = [];
	$tipos = [];
	for ($i=0; $i < count($registros); $i++) { 
		$entradas[$registros[$i]->getVaga()->getIdVaga()] = $registros[$i]->getHoraEntrada();
		$placas[$registros[$i]->getVaga()->getIdVaga()] = $registros[$i]->getVeiculo()->getPlaca();
		$tipos[$registros[$i]->getVaga()->getIdVaga()] = $registros[$i]->getVeiculo()->getTipo();
		$ids[] = $registros[$i]->getVaga()->getIdVaga();
	}

	$codigos = $vagaDAO->getCodigos();

	for ($i=0; $i < count($ids); $i++) { 
		$informacoes[$ids[$i]] = $placas[$ids[$i]];
	}
	for ($i=1; $i <= count($informacoes); $i++) { 
		$mensagem = $mensagem . "<div class='col-lg-3'>";
    	$mensagem = $mensagem . "<div class='panel panel-default'>";
    	$mensagem = $mensagem . "<div class='panel-body'>";	
		if ($informacoes[$i] == "") {
			$mensagem = $mensagem . "<img src='../view/white.png' width='90%'>";
			$mensagem = $mensagem . "<h4 class='text-center'>Vaga ". $codigos[$i-1] . " - Disponível</h4>";
			$mensagem = $mensagem . "<br>";
    		$mensagem = $mensagem . "    	</div>";
		    $mensagem = $mensagem . "	</div>";
		    $mensagem = $mensagem . "</div>";

		} else {
			if ($tipos[$i] == 1) {
				$mensagem = $mensagem . "<img src='../view/car.png' width='100%'>";
			} 
			if ($tipos[$i] == 2) {
				$mensagem = $mensagem . "<img src='../view/moto.png' width='100%'>";
			}
			if($tipos[$i] == 3) {
				$mensagem = $mensagem . "<img src='../view/truck.jpg' width='100%' heigh='300'> ";
			}
			$mensagem = $mensagem . "<h4 class='text-center'>Vaga " . $codigos[$i-1] . " - " . $placas[$i] . "</h4>";
			$mensagem = $mensagem . "<h5 class='text-center'>Entrada: ". $entradas[$i] . "</h5>";
    		$mensagem = $mensagem . "    	</div>";
		    $mensagem = $mensagem . "	</div>";
		    $mensagem = $mensagem . "</div>";
		}
		if ($i == 4 || $i == 8 || $i == 12) $mensagem = $mensagem . "</div><div class='row'>";

	}

		include_once("../view/mostra_estacionamento.php");

?>
