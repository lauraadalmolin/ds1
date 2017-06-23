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
	        <li><a href="form_remedio.php">Novo Remédio</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="lista_remedios.php">Listar remédios</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li class='active'><a href="pesquisar.php">Pesquisar</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>	      
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Pesquisar o produto por pedaço do nome</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='mostra_resultado.php'>
							<input type='text' class="form-control" name='pnome' placeholder='Pedaço do nome a ser pesquisado'><br>
							<input type='text' name='tipo' value='1' hidden>
							<button type="submit" class="btn btn-default">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Pesquisar o produto por fabricante</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='mostra_resultado.php'>
							<input type='text' class="form-control" name='fnome' placeholder='Nome do fabricante'><br>
							<input type='text' name='tipo' value='2' hidden>
							<button type="submit" class="btn btn-default">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Pesquisar os medicamentos controlados</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='mostra_resultado.php'>
					    	<input type='text' name='tipo' value='3' hidden>
							<button type="submit" class="btn btn-default">Pesquisar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Pesquisar produtos com estoque baixo</h3>
					</div>
					<div class="panel-body">
					    <form method='post' action='mostra_resultado.php'>
				
							<input type='text' name='tipo' value='4' hidden>
							<button type="submit" class="btn btn-default">Pesquisar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>