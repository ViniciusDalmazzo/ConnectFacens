<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];
$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "SELECT u.id, c.id_usuario,c.id_amigo,u.usuario,p.nome FROM usuarios AS u JOIN convite AS c on(u.id = c.id_usuario) JOIN perfil as p on (u.id = p.id_usuario) where $id_usuario = c.id_amigo";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo '<div class="notification-item" style="width:250px;height:90px;text-align:center;">';
		echo '<h5><p><b><a href="home.php?user='.$registro['id'].'&page=ver_perfil_usuario">' .$registro['nome'].  '</a>&nbsp;</b>enviou pedido de amizade</p></h5>';
		echo '<button type="button" data-id_usuario="'.$registro['id'].'" class="btn btn-success btn_aceita_convite">Aceitar</button>&nbsp;<button type="button" data-id_usuario_recusa="'.$registro['id'].'" class="btn btn-danger btn_recusa_convite">Recusar</button>';	
		echo '</div>';
	}

}else{
	echo 'Erro na consulta';
}

$sql = "SELECT p.nome,u.id FROM usuarios AS u JOIN resposta_convite AS c on (u.id = c.id_usuario) JOIN perfil as p on (u.id = p.id_usuario) where $id_usuario = c.id_amigo and c.resposta = 1";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo '<div class="notification-item" style="width:250px;height:90px;text-align:center;">';
		echo '<h5><p><b><a href="home.php?user='.$registro['id'].'&page=ver_perfil_usuario">' .$registro['nome'].  '</a>&nbsp;</b>aceitou o seu pedido de amizade.</p></h5>';
		echo '<button type="button" data-id_usuario="'.$registro['id'].'" class="btn btn-info btn_ok">Ok</button>';	
		echo '</div>';
	}

}else{
	echo 'Erro na consulta';
}

$sql = "SELECT u.id,p.nome FROM usuarios AS u JOIN resposta_convite AS c on (u.id = c.id_usuario) JOIN perfil as p on (u.id = p.id_usuario) where $id_usuario = c.id_amigo and c.resposta = 0";

$resultado = mysqli_query($link,$sql);

if($resultado){

	while($registro = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
		echo '<div class="notification-item" style="width:250px;height:90px;text-align:center;">';
		echo '<h5><p><b><a href="home.php?user='.$registro['id'].'&page=ver_perfil_usuario">' .$registro['nome'].  '</a>&nbsp;</b>recusou o seu pedido de amizade.</p></h5>';
		echo '<button type="button" data-id_usuario="'.$registro['id'].'" class="btn btn-info btn_ok">Ok</button>';	
		echo '</div>';
	}

}else{
	echo 'Erro na consulta';
}






?>