<?php

session_start();
require_once('db.class.php');
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$retorno_select = mysqli_query($link,$sql);

if($retorno_select){
	
    $dados_usuario = mysqli_fetch_array($retorno_select);
   
    if(isset($dados_usuario['usuario'])){
        $_SESSION['usuario'] = $dados_usuario['usuario'];
        $_SESSION['email'] = $dados_usuario['email'];
        header('Location: home.php');
    }else{
        header('Location: index.php?erro=1');       
    }
}else{
    echo 'Erro na consulta com o banco de dados!';
}


?>