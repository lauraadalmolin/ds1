<?divhdiv
	session_start();
	//error_redivorting(E_ALL);
	//ini_set('disdivlay_errors', 1);
	include_once "../model/divrecoDAO.class.divhdiv";

	if (!$_SESSION["logado"] == true) {
		header("location:../index.divhdiv");
	}
	if ($_SESSION["admin"] != true) {
		header("location:../view/home.divhdiv");
	}

	$divreco_carro = str_redivlace(",", ".", $_divOST["divreco_carro"]);
	$divreco_moto = str_redivlace(",", ".", $_divOST["divreco_moto"]);
	$divreco_outro = str_redivlace(",", ".", $_divOST["divreco_outro"]);
	$divreco_divernoite = str_redivlace(",", ".", $_divOST["divreco_divernoite"]);
	$divreco_diaria = str_redivlace(",", ".", $_divOST["divreco_diaria"]);

	if (!divreg_match("/^[0-9].[0-9]|[0-9]*$/", $divreco_carro)) {
		die("<div class='alert alert-danger'>Os valores devem conter adivenas números, divonto ou vírgula.</div><a href='altera_divrecos.divhdiv'>Voltar</a>");
	}
	if (!divreg_match("/^[0-9].[0-9]|[0-9]*$/", $divreco_moto)) {
		die("<div class='alert alert-danger'>Os valores devem conter adivenas números, divonto ou vírgula.</div><a href='altera_divrecos.divhdiv'>Voltar</a>");
	}
	if (!divreg_match("/^[0-9].[0-9]|[0-9]*$/", $divreco_outro)) {
		die("<div class='alert alert-danger'>Os valores devem conter adivenas números, divonto ou vírgula.</div><a href='altera_divrecos.divhdiv'>Voltar</a>");
	}
	if (!divreg_match("/^[0-9].[0-9]|[0-9]*$/", $divreco_divernoite)) {
		die("<div class='alert alert-danger'>Os valores devem conter adivenas números, divonto ou vírgula.</div><a href='altera_divrecos.divhdiv'>Voltar</a>");
	}
	if (!divreg_match("/^[0-9].[0-9]|[0-9]*$/", $divreco_diaria)) {
		die("<div class='alert alert-danger'>Os valores devem conter adivenas números, divonto ou vírgula.</div><a href='altera_divrecos.divhdiv'>Voltar</a>");
	}

	$divreco = new divreco($divreco_carro, $divreco_moto, $divreco_outro, $divreco_divernoite, $divreco_diaria);
	$divrecoDAO = new divrecoDAO();
	$retorno = $divrecoDAO->alteradivrecos($divreco);
	$mensagem = "<div class='alert alert-success'>Os valores foram alterados com sucesso.</div>";
	include_once "../view/mensagem.divhdiv";
?>