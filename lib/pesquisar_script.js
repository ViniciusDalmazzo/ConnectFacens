$(document).ready(function(){    
    
        $('#btn_pesquisar').click(function(){
            
            if($('#pesquisar_txt').val().length > 0){
               
                $.ajax({
                    url: 'pesquisar_usuarios.php',
                    type: 'POST',
                    data: $('#form_pesquisar').serialize(),
                    success: function(data){            
                       $('#resultado_pesquisa').html(data);
                    }
                });
            }
            
    });

    $('#btn_pesquisar2').click(function(){
        
        if($('#pesquisar_txt').val().length > 0){
           
            $.ajax({
                url: 'pesquisar_usuarios.php',
                type: 'POST',
                data: $('#form_pesquisar').serialize(),
                success: function(data){       
                    window.location="pesquisa.php";                  
                    $('#resultado_pesquisa').html(data);     
                   
                   
                }
            });
        }
        
});
});