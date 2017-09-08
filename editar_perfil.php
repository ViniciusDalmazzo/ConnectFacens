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
  <script src="lib/post_script.js"></script>
  
  
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
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
            <li><a href="perfil.php"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configurações</span></a></li>
            

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


          <div class="container">
              <h1>Editar Perfil</h1>
              <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                  <div class="text-center">
                    <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 

                    <h6>Clique para mudar a foto do perfil</h6>
                    
                    <input type="file" class="form-control">
                  </div>
                </div>
                
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                  <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a> 
                    <i class="fa fa-user-o"></i>
                    Edite o seu <strong>perfil</strong> alterando os campos abaixo.
                  </div>
                  <h3>Personal info</h3>
                  
                  <form class="form-horizontal" role="form" action="salva_perfil.php">
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Nome:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Nome">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Sobrenome:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Sobrenome">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Data de Nascimento:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="DataNasc">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">País:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Pais">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Estado:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Estado">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Cidade:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Cidade">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Endereço:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" name="Endereco">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 control-label">Gênero:</label>
                      <div class="col-lg-8">
                        <div class="ui-select">
                          <select id="user_time_zone" class="form-control" name="Genero">
                            <option value="Hawaii">Selecione o seu gênero</option>
                            <option value="Hawaii">Masculino</option>
                            <option value="Alaska">Feminino</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Curso:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="Curso">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Semestre:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password" name="Semestre">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Salvar">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancelar">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          <hr>


        </div>


      </body>
      </html>
