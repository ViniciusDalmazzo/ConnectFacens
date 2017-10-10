<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT * FROM img_perfil where id_usuario = $id_usuario";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){		

			echo '<img class="img-circle img-responsive" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></img>';			
	}

}else{
	echo 'Erro na consulta';
}



?>