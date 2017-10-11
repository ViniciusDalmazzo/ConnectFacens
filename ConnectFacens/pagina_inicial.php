 <?php

$usuario = $_SESSION['usuario'];

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
}

if ($_GET['page']=='') {
    header('Location: home.php?page=pagina_inicial');
}

 ?>

<div class="user-dashboard">
                        <h1>Seja Bem Vindo, 

                        <?php

                        require_once('controller/usuariosController.php');

                         $id_usuario = $_SESSION['id_usuario'];
                        
                         $resultado = retornaInfoUsuario($id_usuario);

                        if ($resultado > 0) {
                            $var = $resultado[0];
                            $nome = $var[0];
                            $sobrenome = $var[1];

                            echo ''.$nome.'&nbsp;'.$sobrenome.'';
                        } else {
                           
                        }

                        ?>
                        
                        </h1>
                        <div class="container">

                            <div class="panel panel-headline ">

                            <div class="panel-heading"><h2>Postagens</h2></div>
						
                            <div class="panel-body"><div id="posts" ></div>
							
							
							</div>
                            


                        </div>
                    </div>
                </div>
            </div>

        </div>
