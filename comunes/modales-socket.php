<div class="modal fade" id="modal_mensajes" tabindex="-1" aria-labelledby="modal_mensajelabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable " style="height: 500px!important;">
		<div class="modal-content">
			<div class="modal-header text-dark bg-white">
				<h5 class="modal-title w-100 text-center" id="modal_mensajelabel">Chat de <span id="userName"><?php if (!empty($_SESSION['nombre'])) echo $_SESSION['nombre'];?></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body" id="contenedormensaje">

			</div>	

			<div class="modal-footer">
				<!-- barra de escribir mensaje -->
				<div class="container">
					<div class="row">
						<div class="col-md-12" style="overflow: auto;">
							
							<form id="form-chat" type="chat">
								<div class="row justify-content-center">
									<div class="col-10">
										<input type="text" class="form-control" name="message" id="message"  placeholder="Escriba el mensaje" autofocus autocomplete="off">
									</div> 
									<div class="col-2">
										<button id="submit" type="submit" class="btn btn-primary" userName="<?php if (!empty($_SESSION['nombre'])) echo $_SESSION['nombre'];?>"><i class="bi bi-send-fill"></i></button>
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
					
			</div>	
		</div>
	</div>
</div>