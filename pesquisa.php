<?php 
require_once('db.class.php');
session_start();
$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}
$objDb = new db();
$link = $objDb->conecta_mysql();
$sql = "SELECT * FROM usuarios as u INNER JOIN perfil AS p ON (u.id = p.id_usuario) WHERE u.usuario = '$usuario'";
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
	
	<link href="lib/fa/css/font-awesome.min.css" rel="stylesheet">
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
						<li><a href="amigos.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
						<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Mensagens</span></a></li>	
						<li class="active"><a href="pesquisa.php"><i class="fa fa-search" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Buscar</span></a></li>											
						<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>						
						<li><a href="ver_perfil.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meu Perfil</span></a></li>
						<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configuração</span></a></li>
						<li><a target="_blank" href="http://blackboard.facens.br/"><i class="fa fa-book" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Black Board</span></a></li>
						<li><a target="_blank" href="http://www.facens.br/"><i class="fa fa-university" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Facens</span></a></li>
						

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
							<div class="container">
							<div class="row">    
								<div class="col-xs-8 ">
								<div class="input-group">
								<form name="frmBusca" id="form_pesquisar" style="width:600px;">
						 <input name="pesquisar_txt" style="height:50px;width:500px;" type="text" class="form-control" id="pesquisar_txt" placeholder="Pesquisar">
						 <span class="input-group-btn">
							 <button type="button" style="height:50px;width:50px;" class="btn btn-default"  id="btn_pesquisar"><span class="glyphicon glyphicon-search"></span></button>
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
					<div class="container">					
						
							
					<div id="resultado_pesquisa" class="list-group"></div>

					
				
				</div>

	</body>
	
	<script src="lib/bootstrap2/js/jquery.min.js" type="text/javascript"></script>	
	<script src="lib/bootstrap2/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="lib/pesquisar_script.js" type="text/javascript"></script>
	<script src="lib/post_script.js" type="text/javascript"></script>
	<script src="lib/notificao_script.js" type="text/javascript"></script>
	
	
	</html>