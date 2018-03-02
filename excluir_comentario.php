<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$id_comentario = $_POST['id_comentario_excluir'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "DELETE FROM comentarios WHERE id_comentario = $id_comentario AND id_usuario = $id_usuario";

$resultado = mysqli_query($link,$sql);

?>