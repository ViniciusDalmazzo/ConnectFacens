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
            <li ><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Inicio</span></a></li>
            <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Postagens</span></a></li>
            <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Estatisticas</span></a></li>
            <li><a href="amigos.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Amigos</span></a></li>
            <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calendario</span></a></li>
            <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Configuração</span></a></li>
            <li "><a href="ver_perfil.php"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Meu Perfil</span></a></li>
            

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


                        $count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM convite where id_amigo = $id_usuario");

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
                <div class="panel-heading">  <h4 >Perfil</h4></div>
                <div class="panel-body">

                  <div class="box box-info">

                    <div class="box-body">
                     <div class="col-sm-6">
                       <div  align="center"> <img alt="User Pic"

                       <?php

                        require_once('db.class.php');
                        $id_usuario = $_SESSION['id_usuario'];
                        $objDb = new db();
                        $link = $objDb->conecta_mysql();
                        $user = isset($_GET['user']) ? $_GET['user'] : 0;

                        $sql = " SELECT * FROM img_perfil where id_usuario = $user";

                        $resultado_id = mysqli_query($link,$sql);

                        if (mysqli_num_rows($resultado_id)>0){

                          while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){  

                           echo 'src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"';                   

                         }

                       }else{
                        echo 'src="imagens/users/user_img.jpg"';
                      }



                      ?>


                      id="profile-image1" class="img-circle img-responsive"> 

                      <div id="profile-image-upload" >  </div> 
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
                    <h4 style="color:#00b1b1;" id="nomeCompleto">
                      <?php 
                      require_once("db.class.php");                       
                      $id_usuario = $_SESSION['id_usuario'];
                      $objDb = new db();
                      $link = $objDb->conecta_mysql();
                      $user = isset($_GET['user']) ? $_GET['user'] : 0;

                      $sql = "SELECT nome,sobrenome FROM perfil WHERE id_usuario = $user";

                      $resultado = mysqli_query($link,$sql);

                      if($resultado){

                        while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                          echo $registro['nome'].'   '.$registro['sobrenome'];
                        }

                      }else{
                        echo 'Erro na consulta';
                      }
                      ?> 
                    </h4></span>
                    <span><p id="cursoCompleto">
                      <?php 
                      require_once("db.class.php");                       
                      $id_usuario = $_SESSION['id_usuario'];
                      $objDb = new db();
                      $link = $objDb->conecta_mysql();
                      $user = isset($_GET['user']) ? $_GET['user'] : 0;

                      $sql = "SELECT c.nome_curso FROM perfil as p JOIN curso as c on (c.id_curso = p.id_curso) WHERE p.id_usuario = $user";

                      $resultado = mysqli_query($link,$sql);

                      if($resultado){

                        while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                          echo $registro['nome_curso'];
                        }

                      }else{
                        echo 'Erro na consulta';
                      }
                      ?> 
                    </p></span>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>


                  </div>
                  <div class="clearfix"></div>
                  <hr style="margin:5px 0 5px 0;">


                  <div class="col-sm-5 col-xs-6 tital " >Nome:</div><div class="col-sm-7 col-xs-5 "><span id="nome">
                  <?php 
                  require_once("db.class.php");                       
                  $id_usuario = $_SESSION['id_usuario'];
                  $objDb = new db();
                  $link = $objDb->conecta_mysql();
                  $user = isset($_GET['user']) ? $_GET['user'] : 0;
                  $sql = "SELECT nome FROM perfil WHERE id_usuario = $user";

                  $resultado = mysqli_query($link,$sql);

                  if($resultado){

                    while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                      echo $registro['nome'];
                    }

                  }else{
                    echo 'Erro na consulta';
                  }
                  ?> 
                </span></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Sobrenome:</div><div class="col-sm-7"> <span id="sobrenome"><?php 
                require_once("db.class.php");                       
                $id_usuario = $_SESSION['id_usuario'];
                $objDb = new db();
                $link = $objDb->conecta_mysql();
                $user = isset($_GET['user']) ? $_GET['user'] : 0;

                $sql = "SELECT sobrenome FROM perfil WHERE id_usuario = $user";

                $resultado = mysqli_query($link,$sql);

                if($resultado){

                  while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                    echo $registro['sobrenome'];
                  }

                }else{
                  echo 'Erro na consulta';
                }
                ?> </span></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Data Nascimento:</div><div class="col-sm-7"><span id="dataNasc">
                <?php 
                require_once("db.class.php");                       
                $id_usuario = $_SESSION['id_usuario'];
                $objDb = new db();
                $link = $objDb->conecta_mysql();
                $user = isset($_GET['user']) ? $_GET['user'] : 0;

                $sql = "SELECT data_nascimento FROM perfil WHERE id_usuario = $user";

                $resultado = mysqli_query($link,$sql);

                if($resultado){

                  while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                    echo $registro['data_nascimento'];
                  }

                }else{
                  echo 'Erro na consulta';
                }
                ?> 
              </span></div>
              <div class="clearfix"></div>
              <div class="bot-border"></div>

              <div class="col-sm-5 col-xs-6 tital ">Genêro:</div><div class="col-sm-7"><span id="genero">
              <?php 
              require_once("db.class.php");                       
              $id_usuario = $_SESSION['id_usuario'];
              $objDb = new db();
              $link = $objDb->conecta_mysql();
              $user = isset($_GET['user']) ? $_GET['user'] : 0;

              $sql = "SELECT genero FROM perfil WHERE id_usuario = $user";

              $resultado = mysqli_query($link,$sql);

              if($resultado){

                while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                  echo $registro['genero'];
                }

              }else{
                echo 'Erro na consulta';
              }
              ?> 
            </span></div>

            <div class="clearfix"></div>
            <div class="bot-border"></div>

            <div class="col-sm-5 col-xs-6 tital ">País:</div><div class="col-sm-7"><span id="pais"></span>
            <?php 
            require_once("db.class.php");                       
            $id_usuario = $_SESSION['id_usuario'];
            $objDb = new db();
            $link = $objDb->conecta_mysql();
            $user = isset($_GET['user']) ? $_GET['user'] : 0;

            $sql = "SELECT p.SL_NOME_PT FROM pais as p JOIN perfil as q on (q.id_pais = p.SL_ID) WHERE q.id_usuario = $user";

            $resultado = mysqli_query($link,$sql);

            if($resultado){

              while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                echo $registro['SL_NOME_PT'];
              }

            }else{
              echo 'Erro na consulta';
            }
            ?> 
          </div>

          <div class="clearfix"></div>
          <div class="bot-border"></div>

          <div class="col-sm-5 col-xs-6 tital " >Estado:</div><div class="col-sm-7"><span id="estado">
          <?php 
          require_once("db.class.php");                       
          $id_usuario = $_SESSION['id_usuario'];
          $objDb = new db();
          $link = $objDb->conecta_mysql();
          $user = isset($_GET['user']) ? $_GET['user'] : 0;

          $sql = "SELECT e.UF_NOME FROM estado as e JOIN perfil as p on (p.id_estado = e.UF_ID) WHERE p.id_usuario = $user";

          $resultado = mysqli_query($link,$sql);

          if($resultado){

            while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
              echo $registro['UF_NOME'];
            }

          }else{
            echo 'Erro na consulta';
          }
          ?> 
        </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Cidade:</div><div class="col-sm-7"><span id="cidade"><?php 
        require_once("db.class.php");                       
        $id_usuario = $_SESSION['id_usuario'];
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $user = isset($_GET['user']) ? $_GET['user'] : 0;

        $sql = "SELECT c.CT_NOME FROM cidade as c JOIN perfil as p on (p.id_cidade = c.CT_ID) WHERE p.id_usuario = $user";

        $resultado = mysqli_query($link,$sql);

        if($resultado){

          while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            echo $registro['CT_NOME'];
          }

        }else{
          echo 'Erro na consulta';
        }
        ?> </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Curso:</div><div class="col-sm-7"><span id="idcurso"><?php 
        require_once("db.class.php");                       
        $id_usuario = $_SESSION['id_usuario'];
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $user = isset($_GET['user']) ? $_GET['user'] : 0;

        $sql = "SELECT c.nome_curso FROM perfil as p JOIN curso as c on (c.id_curso = p.id_curso) WHERE p.id_usuario = $user";

        $resultado = mysqli_query($link,$sql);

        if($resultado){

          while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            echo $registro['nome_curso'];
          }

        }else{
          echo 'Erro na consulta';
        }
        ?> </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Semestre:</div><div class="col-sm-7"><span id="Semestre"><?php 
        require_once("db.class.php");                       
        $id_usuario = $_SESSION['id_usuario'];
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        $user = isset($_GET['user']) ? $_GET['user'] : 0;

        $sql = "SELECT s.semestre FROM perfil as p JOIN semestre as s on (s.id_semestre = p.id_semestre) WHERE p.id_usuario = $user";

        $resultado = mysqli_query($link,$sql);

        if($resultado){

          while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            echo $registro['semestre'];
          }

        }else{
          echo 'Erro na consulta';
        }
        ?> </span></div>

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