<?php

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}
require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();
$titulo_post = $_POST['titulo_post'];
$texto_post = $_POST['texto_post'];
$id_usuario = $_SESSION['id_usuario'];
$img = $_FILES["imagem"];

if(isset($_FILES["imagem"])){

	$dir = "imagens/posts/";

if(!is_dir($dir)){
	mkdir($dir);
}

if(move_uploaded_file($img["tmp_name"], $dir . DIRECTORY_SEPARATOR . $img["name"])){

}else{
	echo "erro";
}

$img = $_FILES["imagem"]["name"];

$sql = " INSERT INTO post(id_usuario,post,titulo,img_post)values($id_usuario,'$texto_post','$titulo_post','$img') ";

}else{

	$sql = " INSERT INTO post(id_usuario,post,titulo,img_post)values($id_usuario,'$texto_post','$titulo_post',null) ";
}

mysqli_query($link,$sql);

?>