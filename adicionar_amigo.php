<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = $_POST['amizade_id_usuario'];


if($id_usuario == '' || $seguir_id_usuario == ''){
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT * FROM amizade";

$resultado_id = mysqli_query($link,$sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){
		if($registro['id_usuario'] == $id_usuario && $registro['id_amigo']==$seguir_id_usuario){
			die();
		}

	}

}else{
	echo 'Erro na consulta';
}

$sql = " INSERT INTO convite (id_usuario,id_amigo)values($id_usuario,$seguir_id_usuario)";
mysqli_query($link,$sql);




?>