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
            <li ><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
            <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Postagens</span></a></li>
            <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Estatisticas</span></a></li>
            <li><a href="amigos.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
            <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configuração</span></a></li>
            <li class="active"><a href="ver_perfil.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meu Perfil</span></a></li>
            

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


                        $count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM convite where id_usuario = $id_usuario");

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
            <div class="row">        
             <div class="col-md-7 ">

              <div class="panel panel-default">
                <div class="panel-heading">  <h4 >Meu Perfil</h4></div>
                <div class="panel-body">

                  <div class="box box-info">

                    <div class="box-body">
                     <div class="col-sm-6">
                       <div  align="center"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 

                        <input id="profile-image-upload" class="hidden" type="file">
                        <div style="color:#999;" >Clique para alterar foto</div>
                        <!--Upload Image Js And Css-->

                        <style type="text/css">
                          input.hidden {
                            position: absolute;
                            left: -9999px;
                          }

                          #profile-image1 {
                            cursor: pointer;

                            width: 100px;
                            height: 100px;
                            border:2px solid #03b1ce ;}
                            .tital{ font-size:16px; font-weight:500;}
                            .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}

                            .button {

                               border-top: 1px solid #42b850;
                               background: #65d69a;
                               background: -webkit-gradient(linear, left top, left bottom, from(#3e9c54), to(#65d69a));
                               background: -webkit-linear-gradient(top, #3e9c54, #65d69a);
                               background: -moz-linear-gradient(top, #3e9c54, #65d69a);
                               background: -ms-linear-gradient(top, #3e9c54, #65d69a);
                               background: -o-linear-gradient(top, #3e9c54, #65d69a);
                               padding: 5px 10px;
                               -webkit-border-radius: 30px;
                               -moz-border-radius: 30px;
                               border-radius: 30px;
                               -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
                               -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
                               box-shadow: rgba(0,0,0,1) 0 1px 0;
                               text-shadow: rgba(0,0,0,.4) 0 1px 0;
                               color: white;
                               font-size: 14px;
                               font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
                               text-decoration: none;
                               vertical-align: middle;
                             }
                            .button:hover {
                              border-top-color: #199948;
                              background: #199948;
                              color: #ffffff;
                             }
                            .button:active {
                              border-top-color: #1b5c22;
                              background: #1b5c22;
                             }
                            


                          </style>   


                        </div>

                        <br>

                        <!-- /input-group -->
                      </div>
                      <div class="col-sm-6">
                        <h4 style="color:#00b1b1;" id="nomeCompleto">Guilherme Augusto</h4></span>
                        <span><p id="cursoCompleto">Engenharia da Computação</p></span>
                       <div class="clearfix"></div>
                      <div class="bot-border"></div>
                      <br>
                      <a href="editar_perfil.php" class="button">Editar perfil</a>
            
                      </div>
                      <div class="clearfix"></div>
                      <hr style="margin:5px 0 5px 0;">


                      <div class="col-sm-5 col-xs-6 tital " >Nome:</div><div class="col-sm-7 col-xs-5 "><span id="nome">Augustinho</span></div>
                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Sobrenome:</div><div class="col-sm-7"> <span id="sobrenome">Bueno</span></div>
                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Data Nascimento:</div><div class="col-sm-7"><span id="dataNasc">21 Out 1997</span></div>
                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital ">Genêro:</div><div class="col-sm-7"><span id="genero">As vezes viado</span></div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital ">País:</div><div class="col-sm-7"><span id="pais"></span>Brasil</div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Estado:</div><div class="col-sm-7"><span id="estado">São Paulo</span></div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Cidade:</div><div class="col-sm-7"><span id="cidade">Votorantim</span></div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Endereço:</div><div class="col-sm-7"><span id="end">Vila Nova</span></div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Curso:</div><div class="col-sm-7"><span id="idcurso">Engenharia da Computação</span></div>

                      <div class="clearfix"></div>
                      <div class="bot-border"></div>

                      <div class="col-sm-5 col-xs-6 tital " >Semestre:</div><div class="col-sm-7"><span id="Semestre">6º Semestre</span></div>

                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                  </div>


                </div> 
              </div>
            </div>  


            <script>
              $(function() {
                $('#profile-image1').on('click', function() {
                  $('#profile-image-upload').click();
                });
              });       
            </script> 

          </div>
        </div>


      </body>
      </html>