<?php

require_once('db.class.php');
session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

$id_usuario = $_SESSION['id_usuario'];
$txt = $_POST['pesquisar_txt'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT p.id_usuario,p.nome,p.sobrenome,cu.nome_curso,ci.CT_NOME,se.semestre,i.img,est.UF_NOME FROM usuarios AS u JOIN img_perfil AS i ON (u.id = i.id_usuario) JOIN perfil AS p ON (p.id_usuario = u.id) JOIN curso AS cu ON(cu.id_curso = p.id_curso) JOIN cidade AS ci ON (ci.CT_ID = p.id_cidade) JOIN semestre AS se ON (se.id_semestre = p.id_semestre) JOIN estado AS est ON (est.UF_ID = p.id_estado) where p.id_usuario <> $id_usuario AND (p.nome LIKE '%$txt%' OR p.sobrenome LIKE '%$txt%')";

$resultado = mysqli_query($link,$sql);
	
if($resultado){

    if(mysqli_num_rows($resultado)==0){

        echo '<div class="container" >';
        echo '<div class="list-group-item" style="margin-top:30px;">';
        echo '<strong>Nenhum usuário encontrado!</strong>';
        echo '</div></div>';
    }else{

        while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            
            echo '<div class="container">';
			echo '<div class="list-group-item" style="margin-top:30px;">';
            echo '<strong><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'"><img class="img-circle" style="border: 1px solid lightgrey;" width="50" height="50" src="imagens/users/'.$registro['id_usuario'].'/'.$registro['img'].'"></a><a href="ver_perfil_usuario.php?user='.$registro['id_usuario'].'">&nbsp;&nbsp;'.$registro['nome'].'&nbsp;'.$registro['sobrenome'].'</a></strong><a href="home.php?user='.$registro['id_usuario'].'&page=ver_perfil_usuario"><button style="margin-top: 10px;" type="button" class="btn btn-primary pull-right">Ver Perfil</button><a/>';
            echo '<br/>';
            echo  '<small><div style="width:300px;margin-left:60px;">'.$registro['nome_curso'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$registro['semestre'].'<br/>'.$registro['CT_NOME'].'&nbsp;&nbsp;-&nbsp;&nbsp;'.$registro['UF_NOME'].'</div></small>';
			echo '</div></div>';
            
        }
    }

       
        
    
    }else{
        echo 'Erro na consulta';
    }
    
    
?>