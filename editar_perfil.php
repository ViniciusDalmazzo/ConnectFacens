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
  <script src="lib/img_perfil.js"></script>
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
            <h1>Editar Perfil</h1>
            <hr>
            <div class="row">
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img id="img_perfil_editar_default" alt="User Pic" 

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

                class="img-circle img-responsive">

                <div id="img_perfil_editar">
                </div> 

                <form method="POST" enctype="multipart/form-data" id="form_edita_perfil">
                 <input id="img_perfil_editar" name="img_perfil_editar" type="file">
                 <br>
                 <button type="submit" id="btn_img_perfil_editar" class="btn btn-primary">Editar Foto</button>
               </form>

             </div>
           </div>

           <!-- edit form column -->
           <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">

              <i class="fa fa-user-o"></i>
              Edite o seu <strong>perfil</strong> alterando os campos abaixo.
            </div>
            <h3>Informações</h3>

            <form class="form-horizontal" role="form" action="salva_edita_perfil.php" method="POST">
              <div class="form-group">
                <label class="col-lg-3 control-label">Nome:</label>
                <div class="col-lg-8">
                  <input required class="form-control" type="text" name="Nome">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Sobrenome:</label>
                <div class="col-lg-8">
                  <input required class="form-control" type="text" name="Sobrenome">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Data de Nascimento:</label>
                <div class="col-lg-8">
                  <input required class="form-control" type="date" name="DataNasc">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">País:</label>
                <div class="col-lg-8">
                  <select required id="pais" class="form-control" name="Pais">  
                   <option disabled selected value="">Selecione o seu país</option>                
                   <?php 
                   require_once("db.class.php");                       
                   $id_usuario = $_SESSION['id_usuario'];
                   $objDb = new db();
                   $link = $objDb->conecta_mysql();

                   $sql = "SELECT * FROM pais";

                   $resultado = mysqli_query($link,$sql);

                   if($resultado){

                    while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                      echo'<option value='.$registro['SL_ID'].'>'.$registro['SL_NOME_PT'].'</option>';
                    }

                  }else{
                    echo 'Erro na consulta';
                  }
                  ?>         
                </select>                  

              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Estado:</label>
              <div class="col-lg-8">
                <select required id="estado" class="form-control" name="Estado"> 
                 <option disabled selected value="">Selecione seu estado</option>                     
                 <?php 
                 require_once("db.class.php");                       
                 $id_usuario = $_SESSION['id_usuario'];
                 $objDb = new db();
                 $link = $objDb->conecta_mysql();

                 $sql = "SELECT * FROM estado order by UF_NOME ASC";

                 $resultado = mysqli_query($link,$sql);

                 if($resultado){

                  while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                    echo'<option value='.$registro['UF_ID'].'>'.$registro['UF_NOME'].'</option>';
                  }

                }else{
                  echo 'Erro na consulta';
                }
                ?>         
              </select>       
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Cidade:</label>
            <div class="col-lg-8">
              <select required id="cidade" class="form-control" name="Cidade"> 
               <option disabled selected value="">Selecione sua cidade</option>                     
               <?php 
               require_once("db.class.php");                       
               $id_usuario = $_SESSION['id_usuario'];
               $objDb = new db();
               $link = $objDb->conecta_mysql();

               $sql = "SELECT * FROM cidade order by CT_NOME ASC";

               $resultado = mysqli_query($link,$sql);

               if($resultado){

                while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                  echo'<option value='.$registro['CT_ID'].'>'.$registro['CT_NOME'].'</option>';
                }

              }else{
                echo 'Erro na consulta';
              }
              ?>         
            </select>    
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gênero:</label>
          <div class="col-lg-8">
            <div class="ui-select">
              <select required id="user_time_zone" class="form-control" name="Genero">
                <option disabled selected value="">Selecione o seu gênero</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Curso:</label>
          <div class="col-md-8">
            <select required id="curso" class="form-control" name="Curso"> 
             <option disabled selected value="">Selecione o seu curso</option>                     
             <?php 
             require_once("db.class.php");                       
             $id_usuario = $_SESSION['id_usuario'];
             $objDb = new db();
             $link = $objDb->conecta_mysql();

             $sql = "SELECT * FROM curso order by nome_curso ASC";

             $resultado = mysqli_query($link,$sql);

             if($resultado){

              while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                echo'<option value='.$registro['id_curso'].'>'.$registro['nome_curso'].'</option>';
              }

            }else{
              echo 'Erro na consulta';
            }
            ?>         
          </select>    
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Semestre:</label>
        <div class="col-md-8">
          <select required id="semestre" class="form-control" name="Semestre"> 
           <option disabled selected value="">Selecione o seu semestre</option>                     
           <?php 
           require_once("db.class.php");          
           $objDb = new db();
           $link = $objDb->conecta_mysql();

           $sql = "SELECT * FROM semestre";

           $resultado = mysqli_query($link,$sql);

           if($resultado){

            while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
              echo'<option value='.$registro['id_semestre'].'>'.$registro['semestre'].'</option>';
            }

          }else{
            echo 'Erro na consulta';
          }
          ?>         
        </select>    
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-3 control-label"></label>
      <div class="col-md-8">
        <button type="submit" class="btn btn-info">Salvar</button>
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
