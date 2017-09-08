<?php

require_once('db.class.php');

$nome = $_POST['Nome'];
$sobrenome = $_POST['Sobrenome'];
$genero = md5($_POST['Genero']);
$pais = md5($_POST['Pais']);
$estado = md5($_POST['Estado']);
$cidade = md5($_POST['Cidade']);
$endereco = md5($_POST['Endereco']);
$curso = md5($_POST['Curso']);
$semestre = md5($_POST['Semestre']);

if($genero == 'Masculino')
	$genero = 'M';
if($genero == 'Feminino')
	$genero = 'F';

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " insert into usuarios(nome, sobrenome, dataNasc,genero,pais,estado,cidade,endereco,curso,semestre) values ('$nome', '$sobrenome', '$dataNasc', '$genero', '$pais', '$estado', '$cidade', '$cidade', '$endereco', '$curso', '$semestre')";


if(mysqli_query($link, $sql)){
	header('Location: index.php');	
	echo 'Perfil registrado com sucesso';
}else{
	echo 'Erro ao registrar o Perfil';
}


?>