<?php

$usuario = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

if($_GET['page']==''){
	header('Location: home.php?page=pagina_inicial');
}

?>
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12 gutter">

							<div class="sales report">
								<h2>Amigos</h2>
								
							</div>

							<div id="amigos">

							</div>

						</div>

						<div class="col-md-5 col-sm-5 col-xs-12 gutter">

							<div class="sales">
								<h2>Sugestão de Amigos</h2>

								
							</div>

							
							<div id="sugestao_amigos" >

							</div>


						</div>
					</div>


			