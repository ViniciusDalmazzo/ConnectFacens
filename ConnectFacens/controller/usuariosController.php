<?php
    
    require_once('db.class.php');

    function verificaCadastroPerfil($usuario)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT * FROM usuarios as u INNER JOIN perfil AS p ON (u.id = p.id_usuario) WHERE u.usuario = '$usuario'";
        $retorno_select = mysqli_query($link,$sql);

        if($retorno_select){	
            
            $dados_perfil = mysqli_fetch_array($retorno_select);    
            
            if(isset($dados_perfil['usuario'])){      
                return true;
            }  
        }
        
        return false;
    
    }

    function verificaQtdNotificacao($id_usuario)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $count = 0;
        $count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM convite where id_amigo	 = $id_usuario");
        $c = mysqli_fetch_array($count);					
        $count = mysqli_query($link," SELECT COUNT(id_usuario) as total FROM resposta_convite where id_amigo = $id_usuario");
        $c2 = mysqli_fetch_array($count);
        $count = $c['total'] + $c2['total'] ;
        return $count;
    }

    function verificaImagemPerfil($id_usuario)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = " SELECT id_img_perfil FROM img_perfil where id_usuario = $id_usuario";

        $resultado_id = mysqli_query($link,$sql);

       if (mysqli_num_rows($resultado_id)>0){
            return true;
        }

        return  false;
    }

    function retornaImagemPerfil($id_usuario)
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        
        $img = "";

        $sql = " SELECT img FROM img_perfil where id_usuario = $id_usuario";

        $resultado_id = mysqli_query($link,$sql);

        while($registro = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC)){  
            
            $img = $registro['img'];

            return $img;
                                       
        }

        return $img;
    }

    function retornaPaises()
    {
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT SL_ID,SL_NOME_PT FROM pais";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();

        return $retorno;
    }

    function retornaEstados()
    {       
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT UF_ID,UF_NOME FROM estado";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();
        
        return $retorno;;
    }

    function retornaCidades()
    {       
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT CT_ID,CT_NOME FROM cidade";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();
        
        return $retorno;
    }

    function retornaCursos()
    {       
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT id_curso,nome_curso FROM curso";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();
        
        return $retorno;
    }

    function retornaSemestres()
    {       
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT id_semestre,semestre FROM semestre";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();
        
        return $retorno;
    }

    function retornaInfoUsuario($id_usuario)
    {       
        $objDb = new db();
        $link = $objDb->conecta_mysql();

        $sql = "SELECT p.nome,p.sobrenome,cu.nome_curso,ci.CT_NOME,se.semestre,i.img,est.UF_NOME,pais.SL_NOME_PT,p.data_nascimento,p.genero FROM usuarios AS u JOIN img_perfil AS i ON (u.id = i.id_usuario) JOIN perfil AS p ON (p.id_usuario = u.id) JOIN curso AS cu ON(cu.id_curso = p.id_curso) JOIN cidade AS ci ON (ci.CT_ID = p.id_cidade) JOIN semestre AS se ON (se.id_semestre = p.id_semestre) JOIN estado AS est ON (est.UF_ID = p.id_estado) JOIN pais AS pais ON (pais.SL_ID = p.id_pais) where p.id_usuario = $id_usuario";

        $resultado = mysqli_query($link,$sql);

        $retorno = $resultado->fetch_all();
        
        return $retorno;
    }

    function retornaDadosVerPost($id_post){

        $objDb = new db();

        $link = $objDb->conecta_mysql();
        
        
        $sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y') AS data_inclusao,t.id_usuario as p_usuario, t.post,t.img_post,t.id_post, u.nome,u.sobrenome,u.id_usuario,t.titulo,i.id_usuario,i.img FROM post AS t JOIN perfil AS u ON (t.id_usuario = u.id_usuario) JOIN img_perfil as i on (u.id_usuario = i.id_usuario) WHERE t.id_post = $id_post ORDER BY t.data_inclusao DESC ";
        
        $resultado = mysqli_query($link, $sql);
        $retorno = $resultado->fetch_all();

        return $retorno;
    }

?>