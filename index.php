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

		<!-- bootstrap - link cdn -->
	
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" href="lib/style.css">
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

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/logo_projeto.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse <?= $erro == 1 ? 'in' : '' ?>" aria=expanded="<?= $erro == 1 ? 'true' : 'false' ?>">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="valida_usuario.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>
							<?php

							if($erro == 1){
								echo '<font color="red">Usuário e/ou senha inválido(s)</font>';
							}
							

							?>
						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h2>Bem vindo a rede social da FACENS</h2>
	        <p>Veja o que está acontecendo agora...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
			
	
	

			<footer>
			<div class="footer" id="footer">
					<div>
							<div class="row">
									<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
											<h3> Empresa </h3>
											<ul>
													<li> <a href="#"> Sobre </a> </li>
													<!-- <li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li> -->
											</ul>
									</div>
									<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
											<h3> Conta </h3>
											<ul>
													<li> <a href="#"> Cadastrar </a> </li>
													<li> <a href="#"> Login</a> </li>
													<!-- <li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li> -->
											</ul>
									</div>
									<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
											<h3> Notícias </h3>
											<ul>
													<li> <a href="#"> Ultimas Notícias </a> </li>
													<!-- <li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li> -->
											</ul>
									</div>
									<div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
											<h3> Contato </h3>
											<ul>
													<li> <a href="#"> Envie uma mensagem </a> </li>
													<!-- <li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li>
													<li> <a href="#"> Lorem Ipsum </a> </li> -->
											</ul>
									</div>
									<div class="col-lg-2  col-md-3 col-sm-6 col-xs-6 ">
											<h3> Receba notícias por email </h3>
											<ul>
													<li>
															<div class="input-append newsletter-box text-center">
																	<input type="text" class="full text-center" placeholder="Email ">
																	<button class="btn  bg-gray" type="button"> Inscrever-se <i class="fa fa-long-arrow-right"> </i> </button>
															</div>
													</li>
											</ul>
											
									</div>
									<div class="col-lg-2  col-md-3 col-sm-6 col-xs-6 ">
											<h3> Redes Sociais </h3>
											
											<ul class="social" style="margin-left: 30px">
													<li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
													<li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
													<li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
													<li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
													<li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
											</ul>
									</div>
							</div>
							<!--/.row--> 
					</div>
					<!--/.container--> 
			</div>
			<!--/.footer-->
			
			<div class="footer-bottom">
					<div class="container">
							<p class="pull-left"> Copyright © Connect Facens 2017. All right reserved. </p>							
					</div>
			</div>
			<!--/.footer-bottom--> 
	</footer>
	</body>

<script src="lib/bootstrap/js/bootstrap.js"></script>

</html>