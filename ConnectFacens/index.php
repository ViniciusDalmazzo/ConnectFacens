<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>

<!DOCTYPE html>
<html >
<head>

  <meta charset="UTF-8">
  <title>Connect Facens</title>
  <link rel="icon" href="imagens/icone.ico" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="lib/bootstrap2/css/bootstrap.min.css">
  <link rel="stylesheet" href="lib/style.css">
  <link rel="stylesheet" href="lib/font-titillium.css">
  <script src="lib/bootstrap2/js/bootstrap.min.js"></script>

  
</head>

<body>
  <div class="form">

   <img src="imagens/logo.png" class="logo">

   <ul class="tab-group">
    <li class="tab"><a href="#signup">Cadastrar</a></li>
    <li class="tab active"><a href="#login">Login</a></li>
  </ul>

  <div class="tab-content">

    <div id="login">   
      <h1>Bem-Vindo!</h1>

      <form action="valida_usuario.php" method="post" id="login_form">

        <div class="field-wrap">
          <label>
            Usuário<span class="req">*</span>
          </label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope login_form_icons"></i></span>	
            <input name="usuario" type="text" required autocomplete="off"/>
          </div>	
        </div>

        <div class="field-wrap">
          <label>
            Senha<span class="req">*</span>
          </label>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock login_form_icons"></i></span>
            <input name="senha" type="password"required autocomplete="off"/>
          </div>
        </div>

              <div style="font-size: 20px;text-align: center;margin-bottom: 15px;">
          <?php

          if($erro == 1){
            echo '<font color="red">Usuário e/ou senha inválido(s)</font>';
          }                     

          ?>
        </div>

        <button type="buttom" id="btn_login" class="button button-block"><span class="glyphicon glyphicon-share-alt"></span> Login</button>

      </form>

    </div>

    <div id="signup">   
      <h1>Cadastre-se Grátis</h1>

      <form action="registra_usuario.php" method="post" id="registration_form">

        <div>
          <div class="field-wrap">
            <label>
              Usuário<span class="req">*</span>
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user login_form_icons"></i></span>	
              <input name="usuario" type="text"required autocomplete="off"/>

            </div>
            <?php

            if($erro_usuario == 1){?>
            <div style="text-align: center;padding: 10px;margin-bottom: -40px;">
              echo '<font color="red">Usuário já cadastrado</font>';
            </div>
            <?php     }       

            ?>

            
          </div>

          



          <div class="field-wrap" >
            <label>
              Email<span class="req">*</span>
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope login_form_icons"></i></span>	
              <input name="email" type="email" required autocomplete="off"/>

            </div>

            
            <?php

            if($erro_email == 1){?>
            <div style="text-align: center;padding: 10px;margin-bottom: -40px;">
              echo '<font color="red">Email já cadastrado</font>';
            </div>
            <?php     }       

            ?>
            
          </div>

          

          <div class="field-wrap" >
            <label>
              Senha<span class="req">*</span>
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock login_form_icons"></i></span>
              <input name="senha" type="password"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Confirmar Senha<span class="req">*</span>
            </label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock login_form_icons"></i></span>
              <input type="password"required autocomplete="off"/>
            </div>
          </div>

          <button type="submit" class="button button-block"><span class="glyphicon glyphicon-share-alt"></span> Cadastrar</button>

        </form>

      </div>

    </div><!-- tab-content -->

  </div> <!-- /form -->

  <div id="footer">
    <p>Connect Facens. Copyright © 2017 All Rights are Reserved.</a></p>
  </div>

  <script src="lib/bootstrap2/js/jquery.min.js"></script>

  <script src="lib/index.js"></script>

</body>
</html>
