$(document).ready(function(){
	
	function atualizaNotificacao(){
		
		$.ajax({

			url: 'get_notificacao.php',
			success: function(data){
				$('#notificacao').html(data);	

				$('.btn_aceita_convite').click(function(){

					var id_usuario = $(this).data('id_usuario'); //CONSIGO A PARTIR DESTA TAG NOVA DO HTML5 RECUPERAR A PARTIR DO BOTAO O ID DO USUARIO
					
					$.ajax({

						url: 'aceitar_amigo.php',
						method: 'post',
						data: {aceitar_amizade_id_usuario: id_usuario},
						success: function(data){
							
							atualizaNotificacao();

						}

					});

				});

			}

		});

		


	}

	atualizaNotificacao();

});