<?php 

session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
}


 ?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Connect Facens</title>
		<link rel="shortcut icon" href="imagens/icone.ico" />
		
		<!-- jquery - link cdn -->
		<script src="lib/jquery/jquery.min.js"></script>
		<script src="lib/javascript.js"></script>
		<link href="lib/fa/css/font-awesome.min.css" rel="stylesheet">
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="lib/body.css">
		<link rel="stylesheet" href="lib/style.css">
	
	</head>

	<body class="home">
	<div class="container-fluid display-table">
			<div class="row display-table-row">
					<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
							<div class="logo">
									<a hef="home.html"><img src="imagens/logo_projeto.png" alt="Connect Facens" class="hidden-xs hidden-sm">
											<img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
									</a>
							</div>
							<div class="navi">
									<ul>
											<li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
											<li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Postagens</span></a></li>
											<li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Estatisticas</span></a></li>
											<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
											<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
											<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configurações</span></a></li>
									</ul>
							</div>
					</div>
					<div class="col-md-10 col-sm-11 display-table-cell v-align" id="body-home">
							<!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
							<div class="row">
									<header>
											<div class="col-md-7">
													<nav class="navbar-default pull-left">
															<div class="navbar-header">
																	<button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
																			<span class="sr-only">Toggle navigation</span>
																			<span class="icon-bar"></span>
																			<span class="icon-bar"></span>
																			<span class="icon-bar"></span>
																	</button>
															</div>
													</nav>
													<div class="search hidden-xs hidden-sm">
															<input type="text" placeholder="Pesquisar" id="search">
													</div>
											</div>
											<div class="col-md-5">
													<div class="header-rightside">
															<ul class="list-inline header-top pull-right">
																	<li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Adicionar Postagem</a></li>
																	<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
																	<li>
																			<a href="#" class="icon-info">
																					<i class="fa fa-bell" aria-hidden="true"></i>
																					<span class="label label-primary">3</span>
																			</a>
																	</li>
																	<li class="dropdown">
																			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://jskrishna.com/work/merkury/images/user-pic.jpg" alt="Vinicius">
																					<b class="caret"></b></a>
																			<ul class="dropdown-menu">
																					<li>
																							<div class="navbar-content">
																									<span>JS Krishna</span>
																									<p class="text-muted small">
																											me@jskrishna.com
																									</p>
																									<div class="divider">
																									</div>
																									<a href="#" class="view btn-sm active">View Profile</a>
																							</div>
																					</li>
																			</ul>
																	</li>
															</ul>
													</div>
											</div>
									</header>
							</div>
							<div class="user-dashboard">
									<h1>Hello, Vinicius</h1>
									<div class="row">
											<div class="col-md-5 col-sm-5 col-xs-12 gutter">

													<div class="sales">
															<h2>Amigos</h2>

															<div class="btn-group">
																	<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<span>Periodo:</span> Semana Passada
																	</button>
																	<div class="dropdown-menu">
																			<a href="#">2012</a>
																			<a href="#">2014</a>
																			<a href="#">2015</a>
																			<a href="#">2016</a>
																	</div>
															</div>
													</div>
											</div>
											<div class="col-md-7 col-sm-7 col-xs-12 gutter">

													<div class="sales report">
															<h2>Postagens</h2>
															<div class="btn-group">
																	<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<span>Periodo:</span> Semana Passada
																	</button>
																	<div class="dropdown-menu">
																			<a href="#">2012</a>
																			<a href="#">2014</a>
																			<a href="#">2015</a>
																			<a href="#">2016</a>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>

	</div>



	<!-- Modal -->
	<div id="add_project" class="modal fade" role="dialog">
			<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header login-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h4 class="modal-title">Adicionar Postagem</h4>
							</div>
							<div class="modal-body">
													<input type="text" placeholder="Project Title" name="name">
													<input type="text" placeholder="Post of Post" name="mail">
													<input type="text" placeholder="Author" name="passsword">
													<textarea placeholder="Desicrption"></textarea>
									</div>
							<div class="modal-footer">
									<button type="button" class="cancel" data-dismiss="modal">Close</button>
									<button type="button" class="add-project" data-dismiss="modal">Save</button>
							</div>
					</div>

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
</html>