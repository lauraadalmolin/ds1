<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Sistema Escolar</title>
</head>
<body>
    <ul>
        <li><a class="active" href="index.html">In&iacute;cio</a></li>
        <li><a class="active" href="cadastro_aluno.html">Cadastrar Aluno</a></li>
        <li><a href="cadastro_disciplina.html">Cadastrar Disciplina</a></li>
        <li><a href="consulta_aluno.html">Buscar Aluno</a></li>
        <li><a href="matricula.php">Matricular Aluno</a></li>
    </ul>
    <br>
    
	<?php

		$matricula = $_POST["matricula"];
        if(empty($matricula)) {
            die("<div class='center_align micro_div center'><p class='error'>Você deve informar uma matrícula!</p><a href='consulta_aluno.html'>Voltar</a></div>");
        } else {
            busca($matricula); 
        }
	?>

</body>
</html>

<?php

function busca ($matricula) {

 	$arq_disc = fopen("disciplinas.csv", "r");
    $disciplinas = array();
    if ($arq_disc) {
        while (($linha = fgets($arq_disc)) !== false) {
            $disciplinas[] = explode(";", $linha);            
        }  
    }  
    fclose($arq_disc);

    $arq_mats = fopen("matriculas.csv", "r");
    $matriculas = array();
    if ($arq_mats) {
        while (($linha = fgets($arq_mats)) !== false) {
            $matriculas[]  = explode(";", $linha);            
        }  
    }
    fclose($arq_mats);
    
    $arq_mats = fopen("alunos.csv", "r");
    $escolhido = array();
    if ($arq_mats) {
        while (($linha = fgets($arq_mats)) !== false) {
            $aluno = explode(";", $linha);   
            if ($aluno[0] == $matricula) {
            	$escolhido = $aluno;
            }         
        }  
    }
    fclose($arq_mats);
    
    $cods_disc = array();
    for ($i=0; $i < count($matriculas); $i++) { 
 
        if ($escolhido[0] == $matriculas[$i][1]) {
            $cods_disc[] = $matriculas[$i][0];
        }   
    }

    $discs = array();
    for ($j=0; $j < count($cods_disc); $j++) { 
    	
    	for ($k=0; $k < count($disciplinas); $k++) { 
    		if ($disciplinas[$k][0] == $cods_disc[$j]) {
            $discs[] = $disciplinas[$k][1];            
        	}
    	}        
    }
    if (empty($escolhido[1])) {
        die ("<div class='center_align micro_div center'><p class='error'>Não foi encontrado aluno correspondente à matrícula informada.</p><a href='consulta_aluno.html'>Voltar</a></div>");
    } else {
        echo "<div class='center_align micro_div justify'>";
        echo "<h1 class='big_title'>" . $escolhido[1] . "</h1>";
        echo "<p> Matrícula: " . $escolhido[0] . "</p>";    
        echo "<p> E-mail: " . $escolhido[2] . "</p>";
        echo "<p> Telefone: " . $escolhido[3] . "</p>";    
        echo "<p> Disciplinas em que está matriculado(a): </p>";
        if (count($discs) > 0) {
            for ($i=0; $i < count($discs); $i++) { 
                echo "<p>" . $discs[$i] . "</p>";
            } 
        } 
        else {
            echo "<p>Nenhuma</p>";
        }
        
        echo "<a href='consulta_aluno.html'>Voltar</a></div>";
    }
   
   
  
} 

?>