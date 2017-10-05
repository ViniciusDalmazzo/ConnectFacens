<?php

function valida()
{
session_start();
require_once('db.class.php');
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT id,usuario,email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
$retorno_select = mysqli_query($link,$sql);

$sql2 = "SELECT * FROM usuarios as u INNER JOIN perfil AS p ON (u.id = p.id_usuario) WHERE u.usuario = '$usuario'";
$retorno_select2 = mysqli_query($link,$sql2);

if($retorno_select){
	
    $dados_usuario = mysqli_fetch_array($retorno_select);
    $dados_perfil = mysqli_fetch_array($retorno_select2);    
    
    if(!isset($dados_perfil['usuario'])){

        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['usuario'] = $dados_usuario['usuario'];
        $_SESSION['email'] = $dados_usuario['email'];        
        header('Location: home.php?page=cadastrar_perfil');

    }
    else if(isset($dados_usuario['usuario'])){

        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['usuario'] = $dados_usuario['usuario'];
        $_SESSION['email'] = $dados_usuario['email'];        
        header('Location: home.php?page=pagina_inicial');

    }else{
        header('Location: index.php?erro=1');       
    }
}else{
    echo 'Erro na consulta com o banco de dados!';
}

}


?>