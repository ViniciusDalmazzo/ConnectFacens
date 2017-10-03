<?php

require_once('db.class.php');
$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

if($_GET['page']==''){
	header('Location: home.php?page=pagina_inicial');
}

?>
          <div class="container">
            <div class="row">        
             <div class="col-md-7 ">

              <div class="panel panel-default">
                <div class="panel-heading">  <h4 >Meu Perfil</h4></div>
                <div class="panel-body">

                  <div class="box box-info">

                    <div class="box-body">
                     <div class="col-sm-6">
                       <div  align="center"><img alt="User Img" 

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



                      id="profile-image1" class="img-circle img-responsive"> 

                      <div id="profile-image-upload" >  </div>                      


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

                      $sql = "SELECT nome,sobrenome FROM perfil WHERE id_usuario = $id_usuario";

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

                      $sql = "SELECT c.nome_curso FROM perfil as p JOIN curso as c on (c.id_curso = p.id_curso) WHERE p.id_usuario = $id_usuario";

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
                    <a href="home.php?page=editar_perfil" class="button">Editar perfil</a>

                  </div>
                  <div class="clearfix"></div>
                  <hr style="margin:5px 0 5px 0;">


                  <div class="col-sm-5 col-xs-6 tital " >Nome:</div><div class="col-sm-7 col-xs-5 "><span id="nome">
                  <?php 
                  require_once("db.class.php");                       
                  $id_usuario = $_SESSION['id_usuario'];
                  $objDb = new db();
                  $link = $objDb->conecta_mysql();

                  $sql = "SELECT nome FROM perfil WHERE id_usuario = $id_usuario";

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

                $sql = "SELECT sobrenome FROM perfil WHERE id_usuario = $id_usuario";

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

                $sql = "SELECT data_nascimento FROM perfil WHERE id_usuario = $id_usuario";

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

              $sql = "SELECT genero FROM perfil WHERE id_usuario = $id_usuario";

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

            $sql = "SELECT p.SL_NOME_PT FROM pais as p JOIN perfil as q on (q.id_pais = p.SL_ID) WHERE q.id_usuario = $id_usuario";

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

          $sql = "SELECT e.UF_NOME FROM estado as e JOIN perfil as p on (p.id_estado = e.UF_ID) WHERE p.id_usuario = $id_usuario";

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

        $sql = "SELECT c.CT_NOME FROM cidade as c JOIN perfil as p on (p.id_cidade = c.CT_ID) WHERE p.id_usuario = $id_usuario";

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

        $sql = "SELECT c.nome_curso FROM perfil as p JOIN curso as c on (c.id_curso = p.id_curso) WHERE p.id_usuario = $id_usuario";

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

        $sql = "SELECT s.semestre FROM perfil as p JOIN semestre as s on (s.id_semestre = p.id_semestre) WHERE p.id_usuario = $id_usuario";

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

