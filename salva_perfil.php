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
	header('Location: home.php?page=pagina_inicial');	
}else{
	echo 'Erro ao registrar o Perfil';
}

$get = mysqli_fetch_assoc(mysqli_query($link, "SELECT id_perfil FROM perfil WHERE id_usuario = $id_usuario"));
$id_perfil = $get['id_perfil'];

$sql = " SELECT * FROM img_perfil where id_usuario = $id_usuario";

$resultado_id = mysqli_query($link,$sql);

if (mysqli_num_rows($resultado_id)>0){	

	while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){  

		$sql1 = "UPDATE img_perfil SET id_perfil=$id_perfil where id_usuario = $id_usuario";

		if(mysqli_query($link, $sql1)){
			header('Location: home.php?page=pagina_inicial');	
		}else{
			echo 'Erro ao registrar o Perfil';
		}

	}

}else{
	$newPath = "imagens/users/".$id_usuario."/";

	if(!is_dir($newPath)){
		mkdir($newPath);
	}
	
	$imagePath = "imagens/users/user_img.jpg";

	$ext = '.jpg';
	$img_name = 'img_perfil_user_'.$id_usuario.$ext;
	$newName  = $newPath.$img_name;
	$copied = copy($imagePath , $newName);

	$sql2 = " insert into img_perfil(id_usuario,id_perfil,img) values ($id_usuario,$id_perfil,'$img_name')";
	if(mysqli_query($link, $sql2)){
		header('Location: home.php?page=pagina_inicial');	
	}else{
		echo 'Erro ao registrar o Perfil';
	}
}




?>