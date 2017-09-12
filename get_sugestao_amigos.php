<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " Select * from (Select * from usuarios where id NOT IN (select id_usuario From amizade where id_usuario = $id_usuario )) teste JOIN img_perfil AS i ON (id = i.id_usuario) where id IN (Select id from usuarios where id IN (Select id_amigo from convite where id_usuario = $id_usuario )) ";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

			echo '<div style="height: 75px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'"><img class="img-circle" style="border: 1px solid lightgrey;" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['usuario'].'</a> </strong><button style="margin-top: 10px;pointer-events:none;outline:none;background-color:green;"data-id_usuario="'.$registro['id'].'" type="button" class="btn btn_seguir btn-primary pull-right">Convite Enviado</button>';
			echo '</a></div>';

	}

}else{
	echo 'Erro na consulta';
}



$sql = " SELECT * FROM usuarios AS u JOIN img_perfil AS i ON (u.id = i.id_usuario) where id not  IN (SELECT id_amigo FROM amizade where id_usuario = $id_usuario UNION SELECT id_amigo FROM convite WHERE id_usuario = $id_usuario) AND id <> $id_usuario";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

			echo '<div style="height: 75px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'"><img class="img-circle" style="border: 1px solid lightgrey;" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['usuario'].'</a> </strong><button style="margin-top: 10px;" data-id_usuario="'.$registro['id'].'" type="button" class="btn btn_seguir btn-primary pull-right">Adicionar</button>';
			echo '</a></div>';

	}

}else{
	echo 'Erro na consulta';
}

?>