<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao, t.post,t.img_post, u.usuario,u.id,t.titulo FROM post AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ORDER BY data_inclusao DESC";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		if($registro['img_post']==''){
			echo '<div class="list-group-item btn_comment ">';
			echo '<h4 class="list-group-item-heading "><a href="ver_perfil_usuario.php?user='.$registro['id'].'">'.$registro['usuario'].'</a> <small class="pull-right"> '.$registro['data_inclusao'].'</small></h4>';
			echo '<h5><b>'.$registro['titulo'].'</b></h5>';
			echo '<p class="list-group-item-text">'.$registro['post'].'</p>';
			echo '</div>';
		}else{
			echo '<div class="list-group-item btn_comment ">';
			echo '<h4 class="list-group-item-heading "><a href="ver_perfil_usuario.php?user='.$registro['id'].'">'.$registro['usuario'].'</a> <small class="pull-right"> '.$registro['data_inclusao'].'</small></h4>';
			echo '<h5><b>'.$registro['titulo'].'</b></h5>';
			echo '<p class="list-group-item-text">'.$registro['post'].'</p>';
			echo '<p class="list-group-item-text"><img class="img-thumbnail" width="300" height="300" src="imagens/posts/'.$registro['img_post'].'"></p>';
			echo '</div>';
		}
		
	}

}else{
	echo 'Erro na consulta';
}


?>