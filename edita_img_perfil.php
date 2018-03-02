<?php

session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}
require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();
$id_usuario = $_SESSION['id_usuario'];
$img = $_FILES["img_perfil_editar"];


if(isset($_FILES["img_perfil_editar"])){

	 $dir = "imagens/users/".$id_usuario."/";	

	if(!is_dir($dir)){
		mkdir($dir);
	}


	$ext1 = $_FILES['img_perfil_editar']['name'];
	$ext = pathinfo($ext1, PATHINFO_EXTENSION);
	$img_name = 'img_perfil_user_'.$id_usuario.'.'.$ext;
	

	if(file_exists($dir.$img)){
		unlink($dir.$img);
	}

	if(move_uploaded_file($img["tmp_name"], $dir . DIRECTORY_SEPARATOR . $img_name)){

	}else{
		echo "erro";
	}	

	$sql = "update img_perfil set img ='$img_name' where id_usuario = $id_usuario ";
	mysqli_query($link,$sql);

	}

?>