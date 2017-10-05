<?php

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
                <div class="panel-heading">  <h4 >Perfil</h4></div>
                <div class="panel-body">

                  <div class="box box-info">

                    <div class="box-body">
                     <div class="col-sm-6">
                       <div  align="center"> <img alt="User Pic"
                 
                      <?php
						            require_once('controller/usuariosController.php');

                        $user = isset($_GET['user']) ? $_GET['user'] : 0;

                        if (verificaImagemPerfil($user)){

							              $img = retornaImagemPerfil($id_usuario);

                            echo 'src="imagens/users/'.$id_usuario.'/'.$img.'"'; 

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

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $nome = $var[0];
                        $sobrenome = $var[1];

                        echo ''.$nome.'&nbsp;'.$sobrenome.'';  
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                    ?> 

                    </h4></span>
                    <span><p id="cursoCompleto"> 

                    <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $nome_curso = $var[2];

                        echo $nome_curso;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
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

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $nome = $var[0];

                        echo $nome;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                  ?> 

                </span></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Sobrenome:</div><div class="col-sm-7"> <span id="sobrenome">
                
                <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $sobrenome = $var[1];

                        echo $sobrenome;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                ?> 
                
                </span></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Data Nascimento:</div><div class="col-sm-7"><span id="dataNasc">
                
                <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $data_nascimento = $var[8];

                        echo $data_nascimento;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                ?> 

              </span></div>
              <div class="clearfix"></div>
              <div class="bot-border"></div>

              <div class="col-sm-5 col-xs-6 tital ">Genêro:</div><div class="col-sm-7"><span id="genero">
              
              <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $genero = $var[9];

                        echo $genero;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

              ?> 

            </span></div>

            <div class="clearfix"></div>
            <div class="bot-border"></div>

            <div class="col-sm-5 col-xs-6 tital ">País:</div><div class="col-sm-7"><span id="pais"></span>
            
                  <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $pais = $var[7];

                        echo $pais;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                  ?> 

          </div>

          <div class="clearfix"></div>
          <div class="bot-border"></div>

          <div class="col-sm-5 col-xs-6 tital " >Estado:</div><div class="col-sm-7"><span id="estado">
          
                  <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $estado = $var[6];

                        echo $estado;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                  ?> 

        </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Cidade:</div><div class="col-sm-7"><span id="cidade">
        
                  <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $cidade = $var[3];

                        echo $cidade;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }

                  ?> 
        
        </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Curso:</div><div class="col-sm-7"><span id="idcurso">
        
                  <?php 

                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $nome_curso = $var[2];

                        echo $nome_curso;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }
                  ?> 
        
        </span></div>

        <div class="clearfix"></div>
        <div class="bot-border"></div>

        <div class="col-sm-5 col-xs-6 tital " >Semestre:</div><div class="col-sm-7"><span id="Semestre">
        
                  <?php 
                      require_once('controller/usuariosController.php');

                      $user = isset($_GET['user']) ? $_GET['user'] : 0;
                                  
                      $resultado = retornaInfoUsuario($user);

                        if ($resultado > 0){

                        $var = $resultado[0];
                        $semestre = $var[4];

                        echo $semestre;
                      }
                      else{
                        header('Location: home.php?page=cadastrar_perfil');
                      }
                  ?> 
        
        </span></div>

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
