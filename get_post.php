<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao, t.id_usuario as p_usuario,t.post,t.img_post,t.id_post, u.nome,u.sobrenome,u.id_usuario,t.titulo,i.id_usuario,i.img FROM post AS t JOIN perfil AS u ON (t.id_usuario = u.id_usuario) JOIN img_perfil as i on (u.id_usuario = i.id_usuario) ORDER BY t.data_inclusao DESC";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		if($registro['img_post']==''){	
			echo '<div class="panel"><div panel-heading>';
			echo '<div class="btn-group pull-right"><li class="dropdown">	
			<button class="btn btn-primary dropdown-toggle drop_post" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span>Opções</span>
			</button>
			<ul class="dropdown-menu"><li>
				<a href="home.php?page=ver_post&post='.$registro['id_post'].'">Ver Postagem</a></li>';
				if($registro['p_usuario']==$id_usuario){
                    echo '<li><a href="#" class="post_excluir" data-id_post="'.$registro['id_post'].'">Excluir</a></li>';
                }					
				echo '</li></div>';
			echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a></h3>';
			echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5></div>';			
			echo '<div class="panel-body"><p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p></div>';
			echo '<div class="panel-footer"> <small style="margin-left:93%;"> '.$registro['data_inclusao'].'</small></div></div>';
		}else{
		
			echo '<div class="panel"><div panel-heading>';
			echo '<div class="btn-group pull-right"><li class="dropdown">	
			<button class="btn btn-primary dropdown-toggle drop_post" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span>Opções</span>
			</button>
			<ul class="dropdown-menu"><li>
				<a href="home.php?page=ver_post&post='.$registro['id_post'].'">Ver Postagem</a></li>';
				if($registro['p_usuario']==$id_usuario){
                    echo '<li><a href="#" class="post_excluir" data-id_post="'.$registro['id_post'].'">Excluir</a></li>';
                }					
				echo '</li></div>';
			echo '<h3 class="list-group-item-heading "><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'"><img class="img-circle" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="home.php?page=ver_perfil_usuario&user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</h3></a>';
			
			echo '<h5 align="center"><b>'.$registro['titulo'].'</b></h5>';			
			echo '<p align="center" class="list-group-item-text"><img class="img-thumbnail" width="300" height="300" src="imagens/posts/'.$registro['img_post'].'"></p>';
			echo '<div class="panel-body"><p align="center" style="margin-bottom: 20px;" class="list-group-item-text">'.$registro['post'].'</p></div>';
			echo '<div class="panel-footer"> <small style="margin-left:93%;"> '.$registro['data_inclusao'].'</small></div></div>';
		}

		

		
		
	}

}else{
	echo 'Erro na consulta';
}

?>