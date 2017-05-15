<!DOCTYPE html>
<html>
<head>
	<title>Trabalho</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>	
	<h1 id="cabecalho">Resultados da Pesquisa</h1>
	<?php
	
	/*
		Implemente uma aplicação PHP que permita fazer uma pesquisa de fornecedores a partir
		de seus nomes. O usuário poderá digitar uma string em um formulário web e visualizar os dados
		de todos os fornecedores que possuem a string em seus nomes (a busca deve ser case
		insensitive).   Os   dados   de   cada   fornecedor   estão   armazenados   em   um   array   conforme
		apresentado abaixo. Você pode copiá-lo para seu código, acrescentando mais fornecedores se
		desejar. Os resultados da busca devem aparecer em uma tabela, com três colunas (uma para o
		nome do fornecedor, outra para o endereço, e outra para o CNPJ). O nome e endereço do
		fornecedor devem aparecer em letras maiúsculas. O CNPJ deve aparecer formatado (por
		exemplo, o CNPJ 13268883000167 deve aparecer 13.268.883/0001-67).
		Caso a busca resulte em nenhum resultado, a tabela NÃO deve aparecer e a mensagem
		“Nenhum fornecedor encontrado.” deve ser mostrada. Acrescente um link ao final da página de
		resultado permitindo ao usuário voltar ao formulário de busca (ou faça tudo em um único PHP).
	*/	

    	$fornecedores = array(array('nome' => 'Bit   e   Byte   Informática',  
    							'endereco' =>   'Rua   dos Circuitos, 101', 'cnpj' => '48117564000135'),
						  array('nome' => 'Papelaria   Papiro', 
						  		'endereco' => 'Rua   Sulfite,   123','cnpj' => '10914737000173'),
						  array('nome' => 'Bom gosto Alimentos',
						  		'endereco' => 'Rua do Maracujá, 203', 'cnpj' => '41849142000105'),
						  array('nome' => 'Fruteira do Zé',
						  	    'endereco' => 'Rua do Campo, 60', 'cnpj' => '57273637000179'));
    	// '48117564000135'
    	// 48.117.564/0001-35

		$nome = strtolower($_POST["busca"]);

	
		$tester = -1;

		for ($i=0; $i < count($fornecedores); $i++) { 

			if(strpos(strtolower($fornecedores[$i]["nome"]), $nome) !== false) {

				if ($tester == -1) {
					$tester = 2;

					echo "<table><tr id='topo'><td>Nome</td><td>Endereço</td><td>CNPJ</td></tr>";
				}

				echo "<tr><td>" . strtoupper($fornecedores[$i]["nome"]) ."</td>";
				echo "<td>" . strtoupper($fornecedores[$i]["endereco"]) ."</td>";
				echo "<td>" . substr($fornecedores[$i]["cnpj"], 0, 2) . "." . substr($fornecedores[$i]["cnpj"], 2, 3) ."." . 
					substr($fornecedores[$i]["cnpj"], 5, 3) . "/" . substr($fornecedores[$i]["cnpj"], 8, 4) . "-" . 
					substr($fornecedores[$i]["cnpj"], 12, 2) . "</td></tr>";
				
			}
		}

		if ($tester == 2) echo "</table>";

		if ($tester == -1) {

			echo "<p>Nenhum fornecedor foi encontrado</p>";

		}
		echo "<a href='/form.php'>Clique aqui para voltar</a>"


 ?>

</body>
</html>
