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

$sql = " insert into perfil(id_usuario,nome, sobrenome, data_nascimento,id_pais,id_estado,id_cidade,genero,id_curso,id_semestre) values ($id_usuario,'$nome', '$sobrenome', '$dataNasc',  $pais, $estado, $cidade, '$genero', $curso, $semestre)";


if(mysqli_query($link, $sql)){
	header('Location: home.php');	
}else{
	echo 'Erro ao registrar o Perfil';
}


?>