<?php
	/*
	 * A função fopen vai abrir o arquivo a ser manipulado, de acordo com o
	 * parametro $mode
	 */

	/*
	 * Possíveis Modos
	 * 
	 * 'w'	- Abre o arquivo para apenas escrita; coloca o ponteiro do arquivo no começo do arquivo e diminui (trunca) o tamanho do arquivo para zero. Se o arquivo não existe, tenta criá-lo.
	 * 'w+'	- Abre o arquivo para leitura e escrita; coloca o ponteiro do arquivo no começo e diminui (trunca) o tamanho do arquivo para zero. Se o arquivo não existe, tenta criá-lo.
	 * 'r' 	- Abre o arquivo somente para leitura; coloca o ponteiro de escrita no começo do arquivo. [Retorna um erro caso o arquivo não exista e não tenta cria-lo.]
	 * 'r+' - Abre para leitura e escrita; coloca o ponteiro de escrita no começo do arquivo. [Retorna um erro caso o arquivo não exista e não tenta cria-lo.]
	 * 'a'	- Abre para escrita somente; coloca o ponteiro do arquivo no final. Se o arquivo não existir, tenta criá-lo.
	 * 'a+'	- Abre o arquivo para leitura e escrita; coloca o ponteiro do arquivo no final. Se o arquivo não existir, tenta criá-lo.
	 * 'x'	- Cria e abre o arquivo para escrita somente; coloca o ponteiro no início do arquivo. Se o arquivo já existe, a chamada a fopen() irá falhar, retornando FALSE, gerando um erro nível E_WARNING. Se o arquivo não existe, tenta criá-lo. Esta opção é suportada no PHP 4.3.2 e posteriores, e somente funciona em arquivos locais.
	 * 'x+'	- Cria e abre um arquivo para escrita e leitura; coloca o ponteiro do arquivo no início. Se o arquivo já existe, a chamada a fopen() irá falhar, retornando FALSE, gerando um erro nível E_WARNING. Se o arquivo não existe, tenta criá-lo. Esta opção é suportada no PHP 4.3.2 e posteriores, e somente funciona em arquivos locais.
	 */

	$filename = "/var/www/html/meuarquivo.txt";
	$mode = "a+";
	
	/*
	 * fopen abre o arquivo
	 */
	$arquivo = fopen($filename, $mode); 
	if ($arquivo == FALSE) {
		die("Arquivo nao criado");
	}
	
	/*
	 * fgets le até o fim da linha, ou um tamanho de bits especificos (max. 1024)
	 */
	$arquivo = fopen($filename,$mode);
	if ($arquivo == false) die('Não foi possível abrir o arquivo.');
	$linha = fgets($arquivo);
	echo "Aqui: ".$linha;
	echo "<br>";
	fclose($arquivo); //fecha o arquivo

	$arquivo = fopen($filename,$mode);
	if ($arquivo == false) die('Não foi possível abrir o arquivo.');
	while(!feof($arquivo)) {
		$linha = fgets($arquivo);
		echo $linha;
		echo "<br>";
	}
	fclose($arquivo); //fecha o arquivo

	
	/*
	 * file_get_contents retorna todo conteúdo
	 * de um arquivo como string
	 */
	$arquivo = fopen($filename,$mode);
	$string = file_get_contents('meuarquivo.txt');
	echo "Mostra: ".$string. "<br>";
	fclose($arquivo);
	
	/*
	 * ftruncate apaga o conteúdo do arquivo- trunca o arquivo para um tamanho específico
	 */
	$fp = fopen($filename,$mode);
	ftruncate($fp, 0);
	fclose($fp);
	
	/*
	 * unlink apaga o arquivo
	 */
	echo unlink($filename);
	
	/*
	 * fwrite ecrita no arquivo
	 */
	$arquivo = fopen($filename,$mode);
	if ($arquivo) {
		if (fwrite($arquivo, "Novo conteúdo\n")) {
			echo "escrita realizada com sucesso<br>";
			fclose($arquivo);				
		}
	}
	
	/*
	 * file_exists verifica a existencia de um arquivo
	 * em um diretório
	 */
	$arquivo = $filename;
	if (file_exists($arquivo)) {
		echo "arquivo existente<br>";
	} else {
		echo "arquivo não existente<br>";
	}


	
?>