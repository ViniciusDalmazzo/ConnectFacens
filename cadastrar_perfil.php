<?php
require_once('controller/usuariosController.php');

$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

if($_GET['page']==''){
	header('Location: home.php?page=pagina_inicial');
}


?>
          
          
          <div class="container">
            <h1>Por favor, Cadastre o seu Perfil</h1>
            <hr>
            <div class="row">
              <!-- left column -->
              <div class="col-md-3">
                <div class="text-center">
                  <img id="img_perfil_editar_default" alt="Img Perfil" 

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

                class="img-circle img-responsive">
                <br>
                <div id="img_perfil_editar">
                </div> 

                <form method="POST" enctype="multipart/form-data" id="form_edita_perfil">
                 <input id="img_perfil_editar" name="img_perfil_editar" type="file">
                 <br>
                 <button type="submit" id="btn_img_perfil_cadastrar" class="btn btn-primary">Editar Foto</button>
               </form>
             </div>

           </div>

           <!-- edit form column -->
           <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">

              <i class="fa fa-user-o"></i>
              Cadastre o seu <strong>perfil</strong> alterando os campos abaixo.
            </div>
            <h3>Informações</h3>

            <form class="form-horizontal" role="form" action="salva_perfil.php" method="POST">
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
                   require_once('controller/usuariosController.php');

                   $resultado = retornaPaises();

                   $i = 0;

                   if($resultado){

                    while(!empty($resultado[$i])){
                      $var = $resultado[$i];
                      $var1 = $var[0];
                      $var2 = $var[1];
                      echo'<option value='.$var1.'>'.$var2.'</option>';
                      $i++;
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
                 require_once('controller/usuariosController.php');                      

                 $resultado = retornaEstados();

                 $i = 0;

                 if($resultado){

                  while(!empty($resultado[$i])){
                    $var = $resultado[$i];
                    $var1 = $var[0];
                    $var2 = $var[1];
                    echo'<option value='.$var1.'>'.$var2.'</option>';
                    $i++;
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
               require_once('controller/usuariosController.php');

               $resultado = retornaCidades();

               $i = 0;

               if($resultado){

                while(!empty($resultado[$i])){
                  $var = $resultado[$i];
                  $var1 = $var[0];
                  $var2 = $var[1];
                  echo'<option value='.$var1.'>'.$var2.'</option>';
                  $i = $i + 1;
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
             require_once('controller/usuariosController.php');                       
          
             $resultado = retornaCursos();

             $i = 0;

             if($resultado){

              while(!empty($resultado[$i])){
                $var = $resultado[$i];
                $var1 = $var[0];
                $var2 = $var[1];
                echo'<option value='.$var1.'>'.$var2.'</option>';
                $i++;
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
           require_once('controller/usuariosController.php');                       
           
              $resultado = retornaSemestres();
          
            $i = 0;

           if($resultado){

            while(!empty($resultado[$i])){
              $var = $resultado[$i];
              $var1 = $var[0];
              $var2 = $var[1];
              echo'<option value='.$var1.'>'.$var2.'</option>';
              $i++;
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
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        
      </div>
    </div>
  </form>
</div>
</div>
</div>
<hr>


</div>


