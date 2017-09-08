<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT u.id, c.id_usuario,c.id_amigo,u.usuario FROM usuarios AS u JOIN convite AS c on(u.id = c.id_usuario) where $id_usuario = c.id_amigo";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo '<a href="#" class="btn_comment list-group-item">';
		echo '<h5><p><b>' .$registro['usuario'].  '&nbsp;</b>enviou pedido de amizade</p></h5>';
		echo '<button type="button" data-id_usuario="'.$registro['id'].'" class="btn btn-success btn_aceita_convite">Aceitar</button>&nbsp;<button type="button" data-id_usuario_recusa="'.$registro['id'].'" class="btn btn-danger btn_recusa_convite">Recusar</button>';	
		echo '</a>';
	}

}else{
	echo 'Erro na consulta';
}


?>