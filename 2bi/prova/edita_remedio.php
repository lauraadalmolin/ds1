<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="lista_remedios.php">Farmácia</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-left">
	        <li class="active"><a href="form_remedio.php">Novo Remédio</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_remedios.php">Listar remédios</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="pesquisar.php">Pesquisar</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>	      
	    </div>
	  </div>
	</nav>
<?php
	session_start();
	if (!$_SESSION["admin"] == true) {
		header("location:erro_login2.php");
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
					    	<input type='text' <?php echo "value=".$_POST['nome']; ?> class="form-control" name='nome' placeholder="Nome"> <br>
							<input type='text' <?php echo "value=".$_POST['nome_f']; ?> class="form-control" name='nome_f' placeholder="Nome do Fabricante"> <br>
							<div class="col-md-6">	
					    		<span class="input-group-addon">
						      		<input checked type='radio' <?php if ($_POST['controlado'] == 1) {echo "checked";} ?> name='controlado' value='1'> Controlado 
								</span> 
					    	</div>
					    	<div class="col-md-6">
					    		<span class="input-group-addon">
									<input type='radio' <?php if ($_POST['controlado'] == 0) {echo "checked";} ?> name='controlado' value='0'> Não Controlado 
								</span>
					    	</div>	<br><br>					
							<input  type='number' class="form-control" name='quantidade' placeholder="Quantidade em estoque" <?php echo "value=".$_POST['quantidade']; ?>> <br>
							<input <?php echo "value=".$_POST['preco']; ?> type='text' class="form-control" name='preco' placeholder="Preço (R$ XX,XX)"> <br>
							<input  name='id_m' <?php echo "value=".$_POST['id_m']; ?> type='text' hidden> <br>
							<button type='submit' class='btn btn-default'>Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>