<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$deixar_id_usuario = $_POST['deixar_id_usuario'];
echo $deixar_id_usuario;

if($id_usuario == '' || $deixar_id_usuario == ''){
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " DELETE FROM amizade WHERE id_usuario = $id_usuario AND id_amigo = $deixar_id_usuario ";

mysqli_query($link,$sql);

$sql = " DELETE FROM amizade WHERE id_amigo = $id_usuario AND id_usuario = $deixar_id_usuario ";

mysqli_query($link,$sql);


?>