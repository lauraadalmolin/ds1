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
    <div class='center_align small_div center'>

<?php
    
    $matricula = $_POST["aluno"];
    $cod_disciplina = $_POST["disciplina"];

    salva_matricula($matricula, $cod_disciplina);

    function salva_matricula($matricula, $cod_disciplina) {

        $filename = "matriculas.csv";
        $mode = "a+";
        
        if (tem_vagas($cod_disciplina)) {
            if (nao_matriculado($matricula, $cod_disciplina)) {
                $arquivo = fopen($filename, $mode);
                if (fwrite($arquivo, $cod_disciplina . ";" . $matricula . ";\n")) {          
                    fclose($arquivo);      
                    echo "<p class='success'> Matr&iacute;cula cadastrada com sucesso!</p><a href='matricula.php'>Voltar</a>";        
                }
                else echo "<p class='error'> Não foi poss&iacute;vel salvar o cadastro.</p><a href='matricula.php'>Voltar</a>";
            } else {
                 echo "<p class='error'> O aluno j&aacute; est&aacute; matriculado.</p><a href='matricula.php'>Voltar</a>";
            }
        } else {
                echo "<p class='error'> As vagas para esta disciplina encontram-se esgotadas.</p><a href='matricula.php'>Voltar</a>";
        }

    }

    function nao_matriculado ($matricula, $cod_disciplina) {

        $arq_mats = fopen("matriculas.csv", "r");
        $matriculas = array();
        if ($arq_mats) {
            while (($linha = fgets($arq_mats)) !== false) {
                $matriculas[]  = explode(";", $linha);            
            }  
        }
        fclose($arq_mats);
        $flag = true;
        for ($i=0; $i < count($matriculas); $i++) { 
            if ($matriculas[$i][0] == $cod_disciplina && $matriculas[$i][1] == $matricula) {
                $flag = false;
            }
        }
        return $flag;


    }

    function tem_vagas($cod_disciplina) {

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
       
        $ocorrencias = 0;
        for ($i=0; $i < count($matriculas); $i++) { 
            if ($matriculas[$i][0] == $cod_disciplina) {
                $ocorrencias++;
            }   
        }
        $capacidade = -1;
        for ($j=0; $j < count($disciplinas); $j++) { 
            if ($disciplinas[$j][0] == $cod_disciplina) {
                $capacidade = $disciplinas[$j][2];
            }
        }
      
        if ($capacidade > $ocorrencias) {
            return true;
        } else {
            return false;
        }
       

    }


    ?>
    </div>
</body>
</html>
