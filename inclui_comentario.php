<?php

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}
require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();
$text_comentario = $_POST['comentario_post'];
$id_usuario = $_SESSION['id_usuario'];
$id_post = $_POST['id_post'];
$img = $_FILES["imagem_comentario"];

if($img["name"]!=""){

	$dir = "imagens/posts/comentarios/".$id_post."/";	
    
        if(!is_dir($dir)){
            mkdir($dir);
        }

if(move_uploaded_file($img["tmp_name"], $dir . DIRECTORY_SEPARATOR . $img["name"])){

}else{
	echo "erro";
}

$img = $_FILES["imagem_comentario"]["name"];

$sql = " INSERT INTO comentarios(id_usuario,id_post,comentario,img_comentario)values($id_usuario,$id_post,'$text_comentario','$img') ";

}else{

	$sql = " INSERT INTO comentarios(id_usuario,id_post,comentario,img_comentario)values($id_usuario,$id_post,'$text_comentario',null) ";
}

mysqli_query($link,$sql);

?>