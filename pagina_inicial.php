<?php

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

						require_once('controller/usuariosController.php');

                         $id_usuario = $_SESSION['id_usuario'];
                        
                         $resultado = retornaInfoUsuario($id_usuario);

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
						
						</h1>
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