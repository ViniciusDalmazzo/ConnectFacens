<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>Connect Facens</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />

	<!-- jquery - link cdn -->
	<script src="lib/jquery/jquery.min.js"></script>
	
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/fa/css/font-awesome.min.css" rel="stylesheet">

	
	
	<script>
		$(document).ready( function(){
			$('#btn_login').click(function(){

				var campo_vazio = false;

				if($('#campo_usuario').val()==''){
					campo_vazio = true;
					$('#campo_usuario').css({'border-color': 'red'});
				}else{
					$('#campo_usuario').css({'border-color': 'lightgray'});
				}
				if($('#campo_senha').val()==''){
					campo_vazio = true;
					$('#campo_senha').css({'border-color': 'red'});
				}else{
					$('#campo_senha').css({'border-color': 'lightgray'});
				}

				if(campo_vazio) return false;

			});
		});
	</script>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">Connect Facens</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse <?= $erro == 1 ? 'in' : '' ?>" aria=expanded="<?= $erro == 1 ? 'true' : 'false' ?>">
				
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown <?= $erro == 1 ? 'open' : '' ?>">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Entrar<span class="caret"></span></a>
						<ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
							<div class="col-lg-12">
								<div class="text-center"><h3><b>Entrar</b></h3></div>
								<form method="post" action="valida_usuario.php" id="formLogin">
									<div class="form-group">
										<label for="username">Usuário</label>
										<input type="text" name="usuario" id="campo_usuario" tabindex="1" class="form-control" placeholder="Username" value="" autocomplete="off">
									</div>

									<div class="form-group">
										<label for="password">Senha</label>
										<input type="password" name="senha" id="campo_senha" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-xs-7">
												<input type="checkbox" tabindex="3" name="remember" id="remember">
												<label for="remember"> Remember Me</label>
											</div>
											<div class="col-xs-5 pull-right">
												<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>
											</div>
											<br /><br />
											<div class="erro">
												<?php

												if($erro == 1){
													echo '<font color="red">Usuário e/ou senha inválido(s)</font>';
												}											

												?>
											</div>
										</div>
									</div>
									
								</form>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<link rel="stylesheet" href="lib/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

	<div class="container">

		<form class="well form-horizontal" action=" " method="post"  id="contact_form">
			<fieldset>

				<!-- Form Name -->
				<legend>Novo aqui? Registre-se</legend>

				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label">Usuario</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="first_name" placeholder="Usuario" class="form-control"  type="text">
						</div>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label" >Senha</label> 
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
							<input name="last_name" placeholder="Senha" class="form-control"  type="password">
						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input name="email" placeholder="E-Mail" class="form-control"  type="text">
						</div>
					</div>
				</div>
				

				<!-- radio checks -->
				<div class="form-group">
					<label class="col-md-4 control-label">Aluno da FACENS?</label>
					<div class="col-md-4">
						<div class="radio">
							<label>
								<input type="radio" name="hosting" value="yes" /> Sim
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="hosting" value="no" /> Não
							</label>
						</div>
					</div>
				</div>

				<!-- Text area -->

				<div class="alert alert-success" role="alert" id="success_message">Cadastro efetuado com sucesso <i class="glyphicon glyphicon-thumbs-up"></i> Obrigado por participar da Connect Facens.</div>

				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-4">
						<button type="submit" class="btn btn-warning" >Cadastrar <span class="glyphicon glyphicon-menu-right"></span></button>
					</div>
				</div>

			</fieldset>
		</form>
	</div>
</div><!-- /.container -->

<div class="clearfix"></div>
</div>


</div>


</body>

<script src="lib/bootstrap/js/bootstrap.js"></script>

<style type="text/css">

	body {
		padding-top: 90px;
	}
	/* General sizing */
	ul.dropdown-lr {
		width: 300px;
	}

	/* mobile fix */
	@media (max-width: 768px) {
		.dropdown-lr h3 {
			color: #eee;
		}
		.dropdown-lr label {
			color: #eee;
		}
	}

	.erro{
		margin-top: 15px;
		margin-left: 25px;
	}

</style>
</html>