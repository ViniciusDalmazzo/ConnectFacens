<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = " Select * from usuarios where id not in ( select b.id_amigo from amizade as b inner join usuarios as a on b.id_usuario = a.id) AND $id_usuario <> id";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){

			echo '<div style="height: 55px;"';
			echo '<a href="#" class="list-group-item">';
			echo '<strong>'.$registro['usuario'].'</strong><button data-id_usuario="'.$registro['id'].'" type="button" class="btn btn_seguir btn-primary pull-right">Adicionar</button>';
			echo '</a></div>';

	}

}else{
	echo 'Erro na consulta';
}


?>