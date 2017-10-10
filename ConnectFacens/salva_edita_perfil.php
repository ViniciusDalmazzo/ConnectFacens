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

$sql = " update perfil set nome ='$nome', sobrenome = '$sobrenome',  data_nascimento = '$dataNasc', id_pais = $pais, id_estado = $estado, id_cidade = $cidade, genero = '$genero',  id_curso = $curso,  id_semestre = $semestre where id_usuario = $id_usuario";


if(mysqli_query($link, $sql)){
	header('Location: home.php?page=ver_perfil');	
}else{
	echo 'Erro ao registrar o Perfil';
}


?>