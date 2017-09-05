<?php

require_once('db.class.php');

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

if(mysqli_query($link, $sql)){
	header('Location: index.php');	
echo 'Usuario registrado com sucesso';
}else{
echo 'Erro ao registrar o usuario';
}


?>