<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$id_post = $_POST['id_post_excluir'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "DELETE FROM comentarios WHERE id_post = $id_post AND id_usuario = $id_usuario";

$resultado = mysqli_query($link,$sql);

$sql = "DELETE FROM post WHERE id_post = $id_post AND id_usuario = $id_usuario";

$resultado = mysqli_query($link,$sql);

?>