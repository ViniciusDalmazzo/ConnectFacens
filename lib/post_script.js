$(document).ready(function(){


	$('#btn_post').click(function(){		
			
			$.ajax({
				url: 'inclui_post.php',
				method: 'post',
				data: { texto_post: $('#texto_post').val(), titulo_post: $('#titulo_post').val() },
				success: function(data){

					atualizaPost();					
					$('$texto_post').val('');
					$('$titulo_post').val('');					
					
				}

			});

		

	});

	
	function atualizaPost(){

		$('.btn_teste').click(function(){

			alert('clickou');

		});

		$.ajax({					
			url: 'get_post.php',
			success: function(data){
				$('#posts').html(data);				
			}

		});
	}

	atualizaPost();
	


});