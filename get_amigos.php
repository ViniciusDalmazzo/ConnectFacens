<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();



$sql = " SELECT u.id,u.usuario,a.id_usuario,a.id_amigo,a.data_amizade FROM usuarios AS u JOIN amizade AS a ON (u.id = a.id_amigo) WHERE $id_usuario = a.id_usuario ";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

			echo '<div style="height: 55px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong>'.$registro['usuario'].'</strong><button type="button" data-id_usuario_desfazer="'.$registro['id'].'" class="btn btn_desfazer btn-primary pull-right">Excluir</button>';
			echo '</a></div>';
		
	}

}else{
	echo 'Erro na consulta';
}


?>