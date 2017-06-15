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
	        <li class="active"><a href="form_movimentacao.php">Nova movimentação</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_movimentacoes.php">Listar movimentações</a></li>
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
					    <form method='post' action='salva_movimentacao.php'>
					    	<div class="col-md-6">	
					    		<span class="input-group-addon">
						      		<input checked type='radio' name='tipo' value='receita'> Receita 
								</span> 
					    	</div>
					    	<div class="col-md-6">
					    		<span class="input-group-addon">
									<input type='radio' name='tipo' value='despesa'> Despesa 
								</span>
					    	</div>						
						   	<br>
						   	<br>						
							<select name='categoria' class='form-control'>
								<option value="alimentação">Alimentação</option>
								<option value="supermercado">Supermercado</option>
								<option value="gasolina">Gasolina</option>
								<option value="roupas">Roupas</option>
								<option value="remédios">Remédios</option>
								<option value="outros">Outros</option>
							</select> <br>
							<div class="col-md-6">	
					    		<span class="input-group-addon">
									<input checked type='radio' name='efetivada' value='true'> Efetivada 
								</span> 
					    	</div>
					    	<div class="col-md-6">
					    		<span class="input-group-addon">
									<input type='radio' name='efetivada' value='false'> Não efetivada <br>
								</span>
					    	</div>
					    	<br><br>
							<input type='text' class="form-control" name='data' placeholder="Data da movimentação (AAAA-MM-DD)"> <br>
							<input type='text' class="form-control" name='valor' placeholder="Valor"> <br>
							<input type='text' class="form-control" name='comentario' placeholder="Comentário (opcional)"> <br>
							<button type='submit' class='btn btn-default'>Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>