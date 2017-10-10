<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();



$sql = " SELECT * FROM usuarios AS u JOIN amizade AS a ON ((u.id = a.id_usuario or u.id = a.id_amigo) and (a.id_amigo = $id_usuario or a.id_usuario = $id_usuario)) JOIN img_perfil as i on (u.id = i.id_usuario) JOIN perfil AS p ON (p.id_usuario = u.id) where id <> $id_usuario";

$resultado_id = mysqli_query($link,$sql);

$count = 1;

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
		
		
		if(MOD($count,2)==0){
			echo '<div style="height: 75px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong><a href="home.php?user='.$registro['id_usuario'].'&page=ver_perfil_usuario"><img class="img-circle" style="border: 1px solid lightgrey;" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="home.php?user='.$registro['id_usuario'].'&page=ver_perfil_usuario">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a></strong><button style="margin-top: 10px;" type="button" data-id_usuario_desfazer="'.$registro['id'].'" class="btn btn_desfazer btn-danger pull-right">Excluir</button>';
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