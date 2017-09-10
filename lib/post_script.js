$(document).ready(function(){


	$('#btn_post').click(function(){
		event.preventDefault();
		var postData = new FormData($("#form_post")[0]);
		
		$.ajax({
			url: "inclui_post.php",
			type: "POST",
			data: postData,
   processData: false,  // tell jQuery not to process the data
   contentType: false
}).done(function(msg) {
	$('$texto_post').val('');
	$('$titulo_post').val('');
	atualizaPost();	
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