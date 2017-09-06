<?php 

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}


?>

<!DOCTYPE HTML>
<html lang="pt-br" style="height: 100%;">
<head>
	<meta charset="UTF-8">

	<title>Connect Facens</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />
	
	<script src="lib/bootstrap2/js/jquery.min.js"></script>
	<script src="lib/bootstrap2/js/bootstrap.min.js"></script>
	<script src="lib/amigos_script.js"></script>
	
	
	<link href="lib/fa/css/font-awesome.min.css" rel="stylesheet">
	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="lib/body.css">
	<link rel="stylesheet" href="lib/home_css.css">
	
</head>

<body class="home" style="height: 100%;">
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
						<li ><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
						<li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Postagens</span></a></li>
						<li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Estatisticas</span></a></li>
						<li class="active"><a href="amigos.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
						<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
						<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configurações</span></a></li>
						

					</ul>
				</div>
			</div>

			<div class="col-md-10 col-sm-11 display-table-cell v-align" id="body-home">
				<!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
				<div class="row">
					<header style="height: 98px;">
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
						<div class="col-md-5" style="margin-top: 15px;">
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
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://jskrishna.com/work/merkury/images/user-pic.jpg">
											<?php echo $_SESSION['usuario']; ?>
											<b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li>
													<div class="navbar-content">
														<span>Connect Facens</span>
														<p class="text-muted small">
															connectfacens@gmail.com
														</p>
														<div class="divider">
														</div>
														<a href="sair.php" class="view btn-sm active">Sair</a>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</header>
					</div>

					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12 gutter">

							<div class="sales report">
								<h2>Amigos</h2>
								<div class="btn-group">
									<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span>Filtrar:</span>Tudo
									</button>
									<div class="dropdown-menu">
										<a href="#">Curso</a>
										<a href="#">Semestre</a>
										<a href="#">Cidade</a>										
									</div>
								</div>
							</div>

							<div id="amigos">

							</div>

						</div>

						<div class="col-md-5 col-sm-5 col-xs-12 gutter">

							<div class="sales">
								<h2>Sugestão de Amigos</h2>

								<div class="btn-group">
									<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span>Filtrar:</span>Tudo
									</button>
									<div class="dropdown-menu">
										<a href="#">Curso</a>
										<a href="#">Semestre</a>
										<a href="#">Cidade</a>										
									</div>
								</div>
							</div>

							
							<div id="sugestao_amigos" >

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

									<input id="titulo_post" type="text" placeholder="Titulo" name="name">

									<textarea id="texto_post" style="resize: none;" placeholder="Descrição"></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="cancel" data-dismiss="modal">Fechar</button>
									<button type="button" id="btn_post" class="add-project" data-dismiss="modal">Postar</button>
								</div>
							</div>

						</div>
					</div>


				</body>
				</html>