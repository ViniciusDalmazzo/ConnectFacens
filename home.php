<?php 
require_once('controller/usuariosController.php');

session_start();
$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

if($_GET['page']==''){
	header('Location: home.php?page=pagina_inicial');
}

if(verificaCadastroPerfil($usuario) && $_GET['page']=='cadastrar_perfil'){	   
        header('Location: home.php?page=pagina_inicial');    
}
if(!verificaCadastroPerfil($usuario) && $_GET['page']!='cadastrar_perfil'){
	header('Location: home.php?page=cadastrar_perfil');
}

?>

<!DOCTYPE HTML>
<html lang="pt-br" style="height: 100%;">
<head>
	<meta charset="UTF-8">

	<title>Connect Facens</title>
	<link rel="shortcut icon" href="imagens/icone.ico" />
	
	
	
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
						<li id="li_home" class="active"><a href="home.php?page=pagina_inicial"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
						<li id="li_amigos"><a href="home.php?page=amigos"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
						<li id="li_mensagens"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Mensagens</span></a></li>																	
						<li id="li_calendario"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>						
						<li id="li_perfil"><a href="home.php?page=ver_perfil"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meu Perfil</span></a></li>
						<li id="li_config"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configuração</span></a></li>
						<li ><a target="_blank" href="http://blackboard.facens.br/"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Black Board</span></a></li>
						<li ><a target="_blank" href="http://www.facens.br/"><i class="fa fa-university" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Facens</span></a></li>
						

					</ul>
				</div>
			</div>
			<div class="col-md-10 col-sm-11 display-table-cell v-align" id="body-home">
				<!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
				<div class="row">
					<header style="height: 98px;">
						<div class="col-md-7 ">
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
							<div class="container">
							<div class="row">    
								<div class="col-xs-8 ">
									<div class="input-group">
										       <form name="frmBusca" method="POST" id="form_pesquisar" style="width:600px;">
										<input name="pesquisar_txt" style="height:50px;width:500px;"type="text" class="form-control" id="pesquisar_txt" placeholder="Pesquisar">
										<span class="input-group-btn">
											<button style="height:50px;width:50px;" class="btn btn-default" type="button" id="btn_pesquisar"><span class="glyphicon glyphicon-search"></span></button>
										</span>
                                              </form>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="col-md-5" style="margin-top: 15px;">
							<div class="header-rightside">
								<ul class="list-inline header-top pull-right">
									<li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Adicionar Postagem</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle icon-info" data-toggle="dropdown">

											<i class="fa fa-bell" aria-hidden="true"></i>
											<span class="label label-primary">
												<?php 
												require_once('controller/usuariosController.php');

												if(!isset($_SESSION['usuario'])){
													header('Location: index.php?erro=1');
												}
												$id_usuario = $_SESSION['id_usuario'];

												$aux = verificaQtdNotificacao($id_usuario);

												echo $aux;
												?>
											</span>
										</a>
										<ul class="dropdown-menu" style="height: 350px;width: 240px;overflow: auto;">
											<li>
												<div id="notificacao">



													
												</div>
											</li>
										</ul>
									</li>
									<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>								
									
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
					
					<div id="div_home">					
					
					<?php

					if(isset($_GET['page'])){
						$p = $_GET['page'];
						include($p.".php");
					}

					?>
					
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
					<form method="POST" id="form_post" enctype="multipart/form-data">
					<div class="modal-body">

					
<div class="row">
<div class="col-md-1" style="margin-right: 5px;">
<img class="img-circle" width="50" height="50" 

						<?php
						require_once('controller/usuariosController.php');

                        $id_usuario = $_SESSION['id_usuario'];

                        if (verificaImagemPerfil($id_usuario)){

							$img = retornaImagemPerfil($id_usuario);

                            echo 'src="imagens/users/'.$id_usuario.'/'.$img.'"'; 

                        }else{
                        	echo 'src="imagens/users/user_img.jpg"';
                        }

                      ?>




>
</div >
<div class="col-md-10">
<input  style="margin-top: 0px;width: 504px;margin-left: 10px;" id="titulo_post" type="text" placeholder="Titulo" id="titulo_post" name="titulo_post">
</div>
</div>
					
						

						<textarea required id="texto_post" id="texto_post" name="texto_post" style="resize: none;" placeholder="Descrição"></textarea>
						<input type="file" id="imagem" name="imagem"/>	
					</div>
					<div class="modal-footer">					
						
						<button type="button" class="cancel" data-dismiss="modal">Fechar</button>
						<button type="submit" id="btn_post" class="add-project" data-dismiss="modal">Postar</button>

					</div>
					</form>
				</div>

			</div>
		</div>
		


	</body>

	
	<script src="lib/bootstrap2/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/bootstrap2/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="lib/pesquisar_script.js" type="text/javascript"></script>
	<script src="lib/post_script.js" type="text/javascript"></script>
	<script src="lib/notificao_script.js" type="text/javascript"></script>
	<script src="lib/img_perfil.js" type="text/javascript"></script>
	<script src="lib/amigos_script.js" type="text/javascript"></script>
	
	</html>