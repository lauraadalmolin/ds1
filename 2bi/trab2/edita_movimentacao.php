<!DOCTYPE html>
<html>
<head>
	<title>Finanças</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index_logado.php">Finanças</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="form_movimentacao.php">Nova movimentação</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li class="active"><a href="lista_movimentacoes.php">Listar movimentações</a></li>
	      </ul>

	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>	      
	    </div>
	  </div>
	</nav>
<?php
	session_start();
	if (!$_SESSION["logado"] == true) {
		header("location:erro_login.php");
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					    <h3 class="panel-title">Insira os dados da movimentação em questão</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='salva_edicao.php'>
					    	<div class="col-md-6">	
					    		<span class="input-group-addon">
						      		<input type='radio' name='tipo'<?php if ($_POST['tipo'] == "receita") {echo "checked";} ?> value='receita'> Receita 
								</span> 
					    	</div>
					    	<div class="col-md-6">
					    		<span class="input-group-addon">
									<input type='radio' name='tipo' <?php if ($_POST['tipo'] == "despesa") {echo "checked";} ?> value='despesa'> Despesa 
								</span>
					    	</div>						
						   	<br>
						   	<br>						
							<select name='categoria' class='form-control'>
								<option <?php if($_POST['categoria'] == 'alimentação') echo "selected";?> value="alimentação">Alimentação</option>
								<option <?php if($_POST['categoria'] == 'supermercado') echo "selected";?> value="supermercado">Supermercado</option>
								<option <?php if($_POST['categoria'] == 'gasolina') echo "selected";?> value="gasolina">Gasolina</option>
								<option <?php if($_POST['categoria'] == 'roupas') echo "selected";?> value="roupas">Roupas</option>
								<option <?php if($_POST['categoria'] == 'remédios') echo "selected";?> value="remédios">Remédios</option>
								<option <?php if($_POST['categoria'] == 'outros') echo "selected";?> value="outros">Outros</option>
							</select> <br>
							<div class="col-md-6">	
					    		<span class="input-group-addon">
									<input type='radio' name='efetivada' <?php if ($_POST['efetivada'] == "true") {echo "checked";} ?> value='true'> Efetivada 
								</span> 
					    	</div>
					    	<div class="col-md-6">
					    		<span class="input-group-addon">
									<input type='radio' name='efetivada' <?php if ($_POST['efetivada'] == "false") {echo "checked";} ?> value='false'> Não efetivada <br>
								</span>
					    	</div>
					    	<br><br>
					    	<input type='text' name='id_m' <?php echo "value=".$_POST['id_m']; ?> hidden>
							<input type='text' class="form-control" <?php echo "value=".$_POST['data']; ?> name='data' placeholder="Data da movimentação (DD/MM/AAAA)"> <br>
							<input type='text' class="form-control" <?php echo "value=".$_POST['valor']; ?> name='valor' placeholder="Valor (deve conter no mínimo duas casas decimais [.xx])"> <br>
							<input type='text' class="form-control" <?php echo "value=".$_POST['comentario']; ?> name='comentario' placeholder="Comentário (opcional)"> <br>
							<button type='submit' class='btn btn-default'>Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>