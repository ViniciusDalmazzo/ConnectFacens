<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao, t.post,t.img_post, u.nome,u.sobrenome,u.id_usuario,t.titulo,i.id_usuario,i.img FROM post AS t JOIN perfil AS u ON (t.id_usuario = u.id_usuario) JOIN img_perfil as i on (u.id_usuario = i.id_usuario) ORDER BY t.data_inclusao DESC";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		if($registro['img_post']==''){
			echo '<div class="list-group-item btn_comment "  >';
			echo '<h3 class="list-group-item-heading "><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a> <small class="pull-right"> '.$registro['data_inclusao'].'</small></h3>';
			echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5>';			
			echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p>';
			echo '</div>';
		}else{
			echo '<div class="list-group-item btn_comment " >';
			echo '<h3 class="list-group-item-heading "><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a> <small class="pull-right"> '.$registro['data_inclusao'].'</small></h3>';
			echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5>';			
			echo '<p align="center" class="list-group-item-text"><img class="img-thumbnail" width="300" height="300" src="imagens/posts/'.$registro['img_post'].'"></p>';
			echo '<p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p>';
			echo '</div>';
		}

		

		
		
	}

}else{
	echo 'Erro na consulta';
}

?>