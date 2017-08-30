<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>Connect Facens</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	
</head>

<body>

	<div class="testbox">
		<h1>Cadastrar</h1>

		<form action="/">
			<hr>
			<div class="accounttype">
				<input type="radio" value="None" id="radioOne" name="account" checked/>
				<label for="radioOne" class="radio" chec>Aluno</label>
				<input type="radio" value="None" id="radioTwo" name="account" />
				<label for="radioTwo" class="radio">Não Aluno</label>
			</div>
			<hr>
			<label id="icon" for="name"><i class="icon-envelope "></i></label>
			<input type="text" name="name" id="name" placeholder="Email" required/>
			<label id="icon" for="name"><i class="icon-user"></i></label>
			<input type="text" name="name" id="name" placeholder="Nome" required/>
			<label id="icon" for="name"><i class="icon-shield"></i></label>
			<input type="password" name="name" id="name" placeholder="Senha" required/>
			<div class="gender">
				<input type="radio" value="None" id="male" name="gender" checked/>
				<label for="male" class="radio" chec>Masc.</label>
				<input type="radio" value="None" id="female" name="gender" />
				<label for="female" class="radio">Fem.</label>
			</div> 
			<p>Clicando em registrar, você está aceitando nossos <a href="#">termos e condições</a>.</p>
			<a href="#" class="button">Registrar</a>
		</form>
	</div>
	

</body>

<script src="lib/material/js/jquery.min.js"></script>
<script src="lib/material/js/bootstrap.min.js"></script>

</html>