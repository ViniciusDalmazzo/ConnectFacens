<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!doctype html>
<html>
<head>

	<title>Connect Facens</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="lib/bootstrap2/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="lib/bootstrap2/js/jquery.min.js"></script>
	
	<!-- Bootstrap JavaScript -->
	<script src="lib/bootstrap2/js/bootstrap.min.js"></script>
	
	<!-- Page CSS Files -->
	<link rel="stylesheet" href="lib/tabs.css">
	
	<!--Font-Awesome CSS File--> 
	<link rel="stylesheet" href="lib/bootstrap2/fa/css/font-awesome.min.css">

</head>
<body>

<!--Container Starts-->
<div class="container text-center">

	<!--Row Starts-->
	<div class="row">
	
		<!--Column Starts-->
		<div class="col-md-6 col-md-offset-3">
			
			<!--Panel Starts-->
			<div class="panel panel-default">
				
				<!--Panel Heading Starts-->
				<div class="panel-heading nopadding">
					<div class="row">
						<div class="btn-group btn-group-justified">
							<a href="#" class="btn btn-default btn-lg active" id="login_link">Entrar</a>
							<a href="#" class="btn btn-default btn-lg" id="registration_link">Registrar</a>
						</div>
					</div>
				</div>
				<!--Panel Heading Ends-->
				
				<!--Panel Body Starts-->
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12 <?= $erro == 1 ? 'in' : '' ?>" aria=expanded="<?= $erro == 1 ? 'true' : 'false' ?>">
						
							<!--Login Form Starts-->
							<form method="post" action="valida_usuario.php" id="login_form">
								<div class="title"><h2>Connect Facens</h2></div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope login_form_icons"></i></span>	
											<input name="usuario" type="text" class="form-control input input-lg" placeholder="Seu usuário"  required>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock login_form_icons"></i></span>	
											<input name="senha" type="password" class="form-control input input-lg" placeholder="Sua senha"  required>
										</div>
									</div>
									
									<div class="checkbox text-left">
										<label><input type="checkbox"><span class="remember_me">Remember me</span></label>
									</div>
									
									<div class="butn">
										<button type="buttom" id="btn_login" class="btn btn-default btn-block btn-lg"><span class="glyphicon glyphicon-share-alt"></span> Login</button>
									</div>
									
									<div class="erro">
												<?php

												if($erro == 1){
													echo '<font color="red">Usuário e/ou senha inválido(s)</font>';
												}											

												?>
											</div>
							</form>
							<!--Login Form Ends-->
							
							<!--Registration Form Starts-->
							<form action=" registra_usuario.php" method="post"  id="registration_form">
								<div class="title"><h2>Novo aqui? Registre-se</h2></div>
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
													<input name="primeiroNome" type="text" class="form-control input input-lg" placeholder="Primeiro Nome"  required/>
												</div>
											</div>
										</div>
									
										<div class="col-xs-12 col-sm-6 col-md-6">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
													<input name="ultimoNome" type="text" class="form-control input input-lg" placeholder="Ultimo Nome"  required/>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-envelope registration_form_icons"></i></span>	
											<input name="email" type="email" class="form-control input input-lg" placeholder="Seu Email"  required>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user registration_form_icons"></i></span>	
											<input name="usuario" type="text" class="form-control input input-lg" placeholder="Seu Usuário"  required>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
											<input name="senha" type="password" class="form-control input input-lg" placeholder="Sua Senha"  required>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock registration_form_icons"></i></span>	
											<input type="password" class="form-control input input-lg" placeholder="Confirme a Senha"  required>
										</div>
									</div>
									
									<div class="checkbox text-left">
										<label><input type="checkbox"><span class="check">I agree the terms & conditions.</span></label>
									</div>
									
									<div class="butn">
										<button type="submit" class="btn btn-default btn-block btn-lg"><span class="glyphicon glyphicon-share-alt"></span> Resgister</button>
									</div>
									
									<div class="already_member">
										<p>Already a User ? <a href="#">Log In Here</a></p>
									</div>
							</form>
							<!--Registration Form Ends-->
							
						</div>
					</div>
				</div>
				<!--Panel Body Ends-->
				
			</div>
			<!--Panel Ends-->
			
			<!--Social Button Starts-->
			<div class="social-buttons">
				<div class="row">
					<h4><b>Nos siga em outras redes sociais</b></h4>
				</div>
					
				<div class="row">
					<div class="col-sm-4">
						<button class="btn btn-default btn-lg btn_facebook">
							<i class="fa fa-facebook"></i> Facebook
						</button>
					</div>
	
					<div class="col-sm-4">
						<button class="btn btn-default btn-lg btn_twitter">
							<i class="fa fa-twitter"></i> Twitter
						</button>
					</div>

					<div class="col-sm-4">
						<button class="btn btn-default btn-lg btn_gmail">
							<i class="fa fa-google"></i> Gmail
						</button>
					</div>
				</div>
			</div>
			<!--Social Button Ends-->
			
		</div>
		<!--Column Ends-->
		
	</div>	
	<!--Row Ends-->
	
	<div id="footer">
		<p>Copyright © 2017 All Rights are Reserved. Designed By <a href="http://bootstraplayouts.com/">Connect Facens</a></p>
	</div>
	
</div>
<!--Container Ends-->

<!--Script Starts-->
<script>
$(function() {

    $('#login_link').click(function(e) {
		$("#login_form").delay(100).fadeIn(100);
 		$("#registration_form").fadeOut(100);
		$('#registration_link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#registration_link').click(function(e) {
		$("#registration_form").delay(100).fadeIn(100);
 		$("#login_form").fadeOut(100);
		$('#login_link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

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
<!--Script Ends-->

</body>
</html>