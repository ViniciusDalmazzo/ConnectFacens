<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();



$sql = " SELECT * FROM usuarios AS u JOIN amizade AS a ON ((u.id = a.id_usuario or u.id = a.id_amigo) and (a.id_amigo = $id_usuario or a.id_usuario = $id_usuario)) where id <> $id_usuario";

$resultado_id = mysqli_query($link,$sql);

$count = 1;

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
		
		
		if(MOD($count,2)==0){
			echo '<div style="height: 55px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong><a href="ver_perfil_usuario.php?user='.$registro['id'].'">'.$registro['usuario'].'<a></strong><button type="button" data-id_usuario_desfazer="'.$registro['id'].'" class="btn btn_desfazer btn-danger pull-right">Excluir</button>';
			echo '</a></div>';
		}


         $count++;	

		
	}

}else{
	echo 'Erro na consulta';
}

function MOD( $number, $base ) {

	return $number % $base;

}

?>