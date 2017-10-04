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