<?php 
require_once('db.class.php');
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}
$objDb = new db();
$link = $objDb->conecta_mysql();
$sql = "SELECT * FROM usuarios as u INNER JOIN perfil AS P ON (u.id = p.id_usuario) WHERE u.usuario = '$usuario'";
$retorno_select = mysqli_query($link,$sql);
if($retorno_select){	
    
    $dados_perfil = mysqli_fetch_array($retorno_select);    
    
    if(!isset($dados_perfil['usuario'])){      
        header('Location: cadastrar_perfil.php');
    }
    
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
	<script src="lib/post_script.js"></script>
	<script src="lib/notificao_script.js"></script>
	
	
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
						<li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
						<li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Postagens</span></a></li>
						<li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Estatisticas</span></a></li>
						<li><a href="amigos.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
						<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
						<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configuração</span></a></li>
						<li><a href="ver_perfil.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meu Perfil</span></a></li>
						

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
									<li class="dropdown">
										<a href="#" class="dropdown-toggle icon-info" data-toggle="dropdown">

											<i class="fa fa-bell" aria-hidden="true"></i>
											<span class="label label-primary">
												<?php 
												
												if(!isset($_SESSION['usuario'])){
													header('Location: index.php?erro=1');
												}
												require_once('db.class.php');
												$count =0;
												$id_usuario = $_SESSION['id_usuario'];
												$objDb = new db();
												$link = $objDb->conecta_mysql();
												$count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM convite where id_amigo	 = $id_usuario");
												$c = mysqli_fetch_array($count);					
												$count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM resposta_convite where id_amigo = $id_usuario");
												$c2 = mysqli_fetch_array($count);
												$count = $c['total'] + $c2['total'] ;
												echo $count;
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
					<div class="user-dashboard">
						<h1>Seja bem vindo, 

							<?php 

						require_once('db.class.php');

                         $id_usuario = $_SESSION['id_usuario'];
                         $objDb = new db();
                         $link = $objDb->conecta_mysql();

                         $sql = " SELECT * FROM perfil where id_usuario = $id_usuario";

                         $resultado_id = mysqli_query($link,$sql);

                        if (mysqli_num_rows($resultado_id)>0){

                          while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){  

                           echo ''.$registro['nome'].'&nbsp;'.$registro['sobrenome'].''; 
                           
                         }

                       }else{
                        echo 'src="imagens/users/user_img.jpg"';
                      }


						?></h1>
						<div class="container">

							<div class="sales report ">
								<h2>Postagens</h2>
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

							<div id="posts" >

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
					<form method="POST" id="form_post" enctype="multipart/form-data">
					<div class="modal-body">

					
<div class="row">
<div class="col-md-1" style="margin-right: 5px;">
<img class="img-circle" width="50" height="50" 

<?php
                         require_once('db.class.php');

                         $id_usuario = $_SESSION['id_usuario'];
                         $objDb = new db();
                         $link = $objDb->conecta_mysql();

                         $sql = " SELECT * FROM img_perfil where id_usuario = $id_usuario";

                         $resultado_id = mysqli_query($link,$sql);

                        if (mysqli_num_rows($resultado_id)>0){

                          while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){  

                           echo 'src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"'; 
                           
                         }

                       }else{
                        echo 'src="imagens/users/user_img.jpg"';
                      }



                      ?>




>
</div >
<div class="col-md-10">
<input style="margin-top: 0px;width: 504px;margin-left: 10px;" id="titulo_post" type="text" placeholder="Titulo" id="titulo_post" name="titulo_post">
</div>
</div>
					
						

						<textarea id="texto_post" id="texto_post" name="texto_post" style="resize: none;" placeholder="Descrição"></textarea>
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
	</html>