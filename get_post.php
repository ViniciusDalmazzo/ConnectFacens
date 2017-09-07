<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao, t.post, u.usuario,t.titulo FROM post AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ORDER BY data_inclusao DESC";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo '<a href="#" class="list-group-item btn_comment ">';
		echo '<h4 class="list-group-item-heading ">'.$registro['usuario'].' <small class="pull-right"> '.$registro['data_inclusao'].'</small></h4>';
		echo '<h5><b>'.$registro['titulo'].'</b></h5>';
		echo '<p class="list-group-item-text">'.$registro['post'].'</p>';
		echo '</a>';
	}

}else{
	echo 'Erro na consulta';
}


?>