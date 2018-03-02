<?php

require_once('db.class.php');
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

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();
$id_post = isset($_GET['post']) ? $_GET['post'] : 0;

$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao,t.id_usuario as p_usuario, t.post,t.img_post,t.id_post, u.nome,u.sobrenome,u.id_usuario,t.titulo,i.id_usuario,i.img FROM post AS t JOIN perfil AS u ON (t.id_usuario = u.id_usuario) JOIN img_perfil as i on (u.id_usuario = i.id_usuario) WHERE t.id_post = $id_post ORDER BY t.data_inclusao DESC ";

$resultado = mysqli_query($link, $sql);

if ($resultado) {
    while ($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        if ($registro['img_post']=='') {
            echo '<div class="sales report list-group-item btn_comment " >';
            echo '<div class="btn-group pull-right">		
			<button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span>Opções</span>
			</button>
			<div class="dropdown-menu">
				<a href="home.php?page=ver_post&post='.$registro['id_post'].'">Denunciar Post</a>';
            if ($registro['p_usuario']==$id_usuario) {
                echo '<a href="#">Editar</a>
                    <a href="#">Excluir</a>';
            }
                                                        
            echo '</div>
	</div>';
            echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a></h3>';
            
            echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5>';
            echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p>';
            echo ' <small class="pull-right"> '.$registro['data_inclusao'].'</small></div>';
        } else {
            echo '<div class="sales report list-group-item btn_comment " >';
            echo '<div class="btn-group pull-right">		
			<button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span>Opções</span>
			</button>
			<div class="dropdown-menu">
				<a href="home.php?page=ver_post&post='.$registro['id_post'].'">Denunciar Post</a>';

            if ($registro['p_usuario']==$id_usuario) {
                echo '<a href="#">Editar</a>
                    <a href="#">Excluir</a>';
            }
                                                        
            echo '</div>
		</div>';
            echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</h3></a>';
            
            echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5>';
            echo '<p align="center" class="list-group-item-text"><img class="img-thumbnail" width="300" height="300" src="imagens/posts/'.$registro['img_post'].'"></p>';
            echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p>';
            echo '<small class="pull-right"> '.$registro['data_inclusao'].'</small></div>';
        }
    }
} else {
    echo 'Erro na consulta';
}

?>
<br>
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
<div class="btn-group">		
    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>Ordenar</span>
    </button>
    <div class="dropdown-menu">
        <a href="#">Crescente</a>
        <a href="#">Decrescente</a>                                 
    </div>
</div>
<br><br><br>

</div>
<br>
<div id="comentarios">

</div>
</div>

</div>
