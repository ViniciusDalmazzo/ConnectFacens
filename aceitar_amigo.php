<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$id_amigo = $_POST['aceitar_amizade_id_usuario'];


if($id_usuario == '' || $id_amigo == ''){
	die();
}

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " INSERT INTO amizade (id_usuario,id_amigo)values($id_usuario,$id_amigo) ";

mysqli_query($link,$sql);

$sql = " INSERT INTO amizade (id_amigo,id_usuario)values($id_usuario,$id_amigo) ";

mysqli_query($link,$sql);

$sql = " INSERT INTO resposta_convite (id_usuario,id_amigo,resposta)values($id_usuario,$id_amigo,1)";
mysqli_query($link,$sql);

$sql = " DELETE FROM convite WHERE id_usuario = $id_amigo AND id_amigo = $id_usuario";

mysqli_query($link,$sql);

$sql = " DELETE FROM convite WHERE id_usuario = $id_usuario AND id_amigo = $id_amigo";

mysqli_query($link,$sql);


?>