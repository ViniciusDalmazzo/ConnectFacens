<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$nome = $_POST['Nome'];
$sobrenome = $_POST['Sobrenome'];
$dataNasc = date("Y-m-d", strtotime($_POST['DataNasc']));
$genero = $_POST['Genero'];
$pais = $_POST['Pais'];
$estado = $_POST['Estado'];
$cidade = $_POST['Cidade'];
$curso = $_POST['Curso'];
$semestre = $_POST['Semestre'];
$objDb = new db();
$link = $objDb->conecta_mysql();
$imagePath = "imagens/users/user_img.jpg";
$newPath = "imagens/users/".$id_usuario."/";
$ext = '.jpg';

if(!is_dir($newPath)){
		mkdir($newPath);
	}
$img_name = 'img_perfil_user_'.$id_usuario.$ext;
$newName  = $newPath.$img_name;

$copied = copy($imagePath , $newName);

$sql = " insert into perfil(id_usuario,nome, sobrenome, data_nascimento,id_pais,id_estado,id_cidade,genero,id_curso,id_semestre) values ($id_usuario,'$nome', '$sobrenome', '$dataNasc',  $pais, $estado, $cidade, '$genero', $curso, $semestre)";

if(mysqli_query($link, $sql)){
	header('Location: home.php');	
}else{
	echo 'Erro ao registrar o Perfil';
}
$get = mysqli_fetch_assoc(mysqli_query($link, "SELECT id_perfil FROM perfil WHERE id_usuario = $id_usuario"));
$id_perfil = $get['id_perfil'];
$sql = " insert into img_perfil(id_usuario,id_perfil,img) values ($id_usuario,$id_perfil,'$img_name')";

if(mysqli_query($link, $sql)){
	header('Location: home.php');	
}else{
	echo 'Erro ao registrar o Perfil';
}


?>