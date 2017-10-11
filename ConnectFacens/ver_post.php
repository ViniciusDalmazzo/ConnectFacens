<?php


$usuario = $_SESSION['usuario'];
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
}

if ($_GET['page']=='') {
    header('Location: home.php?page=pagina_inicial');
}

?>
<br>

<div class="container">

<?php

require_once('controller/usuariosController.php');  

$id_usuario = $_SESSION['id_usuario'];
$id_post = isset($_GET['post']) ? $_GET['post'] : 0;

$resultado = retornaDadosVerPost($id_post);
$i = 0;

if($resultado){
    
                 
                    $var = $resultado[$i];
                    $data = $var[0];
                    $usuario = $var[1];
                    $post = $var[2];                    
                    $img = $var[3];
                    $id_post = $var[4];
                    $nome_usuario = $var[5];
                    $sobrenome_usuario = $var[6];
                    $titulo = $var[7];
                    $img_perfil = $var[8];
                  

                    if ($img=='') {
                        echo '<div class="sales report list-group-item btn_comment " >';
                        echo '<div class="btn-group pull-right">		
                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Opções</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="home.php?page=ver_post&post='.$id_post.'">Denunciar Post</a>';
                        echo '</div></div>';
                        echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$usuario.'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$usuario.'/'.$img_perfil.'"></a><a href="home.php?page=ver_perfil_usuario&user='.$usuario.'">&nbsp;&nbsp;'.$nome_usuario.'&nbsp;'.$sobrenome_usuario.'</a></h3>';
                        
                        echo '<h5 align="center"><b>'.$titulo.'</b></h5>';
                        echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$post.'</p>';
                        echo ' <small style="margin-left:93%;"> '.$data.'</small></div>';
                    }else {
                        echo '<div class="sales report list-group-item btn_comment " >';
                        echo '<div class="btn-group pull-right">		
                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>Opções</span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="home.php?page=ver_post&post='.$id_post.'">Denunciar Post</a>';
                        echo '</div></div>';
                        echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$usuario.'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$usuario.'/'.$img_perfil.'"></a><a href="home.php?page=ver_perfil_usuario&user='.$usuario.'">&nbsp;&nbsp;'.$nome_usuario.'&nbsp;'.$sobrenome_usuario.'</a></h3>';
                        
                        echo '<h5 align="center"><b>'.$titulo.'</b></h5>';
                        echo '<p align="center" class="list-group-item-text"><img class="img-thumbnail" width="300" height="300" src="imagens/posts/'.$img.'"></p>';
                        echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$post.'</p>';
                        echo ' <small style="margin-left:93%;"> '.$data.'</small></div>';
                    }
                }else{
                  echo 'Erro na consulta';
                }


   ?>

<br>

<div id="div_escrever_comentario">
<div class="sales report">
<h2>Escrever Comentário</h2>
<br><br><br>
<form method="POST" id="form_comentario" enctype="multipart/form-data">
<textarea name="comentario_post" id="comentario_post" cols="149" rows="5" style="resize: none;-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;"></textarea><br><br>
<input name="id_post" id="id_post" style="display:none"
 <?php $id_post = isset($_GET['post']) ? $_GET['post'] : 0;
 echo 'value='.$id_post;
 echo '>';
 ?>
<input type="file" style="display: inline;
    width: 500px;
    margin-top: 5px;
    margin-left: 3px;" id="imagem_comentario" name="imagem_comentario"/>    
<button type="submit" id="btn_comentar" style="margin-right:5px;background:#5584ff none repeat scroll 0 0;color:white;" class="btn btn-primary pull-right">&nbsp;&nbsp;&nbsp;Comentar</button>
</form>
</div>


</div>

<br>
<div id="div_post_comentarios">
<div class="sales report">
<h2>Comentários</h2>

<br>

</div>
<br>
<div id="comentarios">

</div>
</div>

</div>
<br>
<br>
