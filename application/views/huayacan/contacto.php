<section id="contacto" class="sep-bottom-2x">
	<div class="container">
		<div class="row">
			<div class="col-md-4 sep-top-2x">
				<h4 class="upper">
					<?=$titulo;?>
				</h4>
				<p class="sep-top-xs">
					<?=$parrafo;?>
				</p>
				<div>
					<!-- Start icon box-->
					<div class="icon-box icon-xs sep-top-xs icon-gradient">
						<div class="icon-content img-circle"><i class="fa fa-map-marker"></i></div>
						<div class="icon-box-content">
							<h6>Domicilio</h6>
							
							Palmaris #58 ,<br>
							Av. Huayacan, Cancun Quintntana Roo<br>
							México CP 77500,
						</div>
					</div>
					<!-- End icon box-->
					<!-- Start icon box-->
					<div class="icon-box icon-xs sep-top-xs icon-gradient">
						<div class="icon-content img-circle"><i class="fa fa-envelope"></i></div>
						<div class="icon-box-content">
							<h6>Email</h6>
							<p>
								<a href="mailto:info@huayacan58.com" target="_blank">info@huayacan58.com</a>
							</p>
						</div>
					</div>
					<!-- End icon box-->
					<!-- Start icon box-->
					<div class="icon-box icon-xs sep-top-xs icon-gradient">
						<div class="icon-content img-circle"><i class="fa fa-clock-o"></i></div>
						<div class="icon-box-content">
							<h6>Horario</h6>
							<p>Lun / Vie<br>09:00 - 13.00 / 14:00 - 18:00</p>
						</div>
					</div>
					<!-- End icon box-->
				</div>
			</div>
			<div class="col-md-8 sep-top-2x">
				<h2 class="upper">
					Formulario de Contacto
				</h2>
				<div class="contact-form">
					<?php if($enviado): ?>
					<div id="successMessage" class="alert alert-success text-center">
						<p><i class="fa fa-check-circle fa-2x"></i></p>
						<p>¡Gracias por mandar tu mensaje! Nos pondremos en contacto con usted en breve.</p>
					</div>
					<?php else: ?>

					<div id="successMessage" class="alert alert-success text-center hidden">
						<p><i class="fa fa-check-circle fa-2x"></i></p>
						<p>¡Gracias por mandar tu mensaje! Nos pondremos en contacto con usted en breve.</p>
					</div>
					<div id="failureMessage" style="display:none" class="alert alert-danger text-center">
						<p><i class="fa fa-times-circle fa-2x"></i></p>
						<p>Hubo un problema al enviar su mensaje. Por favor, vuelva a intentarlo.</p>
					</div>
					<div id="incompleteMessage" style="display:none" class="alert alert-warning text-center">
						<p><i class="fa fa-exclamation-triangle fa-2x"></i></p>
						<p>Por favor, complete todos los campos del formulario antes de enviarlo.</p>
					</div>
					<form id="sendMail" action="<?=base_url('mail');?>" method="post" class="form-gray-fields validate">
						<div class="row">
							<small>*campos obligatorios</small>
							<h4 class="upper">datos del interesado</h4>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="interesado" class="upper">
										interesado*
									</label>
									<input type="text" id="interesado" placeholder="capture interesado" name="interesado" class="form-control input-lg required">
								</div>
							</div>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="telefono" class="upper">
										telefono
									</label>
									<input type="tel" id="telefono" placeholder="capture telefono" name="telefono" class="form-control input-lg required">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="email" class="upper">
										email*
									</label>
									<input type="email" id="email" placeholder="capture email" name="email" class="form-control input-lg required">
								</div>
							</div>
						</div>
						<div class="row">
						<h4>datos del agente</h4>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="nombreAgente" class="upper">
										nombre del agente
									</label>
									<input type="text" id="nombreAgente" placeholder="capture nombre del Agente" name="nombreAgente" class="form-control input-lg">
								</div>
							</div>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="telAgente" class="upper">
										telefono del agente
									</label>
									<input type="tel" id="telAgente" placeholder="capture tel del Agente" name="telAgente" class="form-control input-lg">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="emailAgente" class="upper">
										email del Agente
									</label>
									<input type="text" id="emailAgente" placeholder="capture email del Agente" name="emailAgente" class="form-control input-lg">
								</div>
							</div>
						</div>
						<div class="row">
							<h4 class="upper">elige tu local</h4>
							<div class="form-group">
								<label class="col-md-4 control-label upper" for="checkboxes">
									indica que local(es) te interesa(n)
								</label>
								<div class="col-md-4">
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="locales[]" id="checkboxes-0" value="local1">
										Local 1: 90m² + terraza 24m²
									</label>
								</div>
								<div class="checkbox">
									<label for="checkboxes-1">
										<input type="checkbox" name="locales[]" id="checkboxes-1" value="local2">
										Local2: 90m²
									</label>
								</div>
								<div class="checkbox">
									<label for="checkboxes-2">
										<input type="checkbox" name="locales[]" id="checkboxes-2" value="local3">
										Local3: 90m²
									</label>
								</div>
								<div class="checkbox">
									<label for="checkboxes-3">
										<input type="checkbox" name="locales[]" id="checkboxes-3" value="local4">
										Local 4: 90m² + terraza 24m²
									</label>
								</div>
								</div>
							</div>
						</div>
						<div class="row">
							<h4 class="upper">datos del negocio</h4>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
									<label for="nombreNegocio" class="upper">
										nombre Negocio
									</label>
									<input type="text" id="nombreNegocio" placeholder="capture nombre de su Negocio" name="nombreNegocio" class="form-control input-lg required">
								</div>
							</div>
							<div class="col-md-6 sep-top-xs">
								<div class="form-group">
								<label for="giroNegocio" class="upper">
									giro Negocio
								</label>
								<input type="text" id="giroNegocio" placeholder="capture giro de su Negocio" name="giroNegocio" class="form-control input-lg required">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="col-md-4 control-label upper" for="radios">es propio</label>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="propio" id="radios-0" value="1" checked="checked">
										Si
									</label> 
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="propio" id="radios-1" value="2">
										No
									</label> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="col-md-4 control-label upper" for="radios">es franquicia</label>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="franquicia" id="radios-0" value="1" checked="checked">
										Si
									</label> 
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="franquicia" id="radios-1" value="2">
										No
									</label> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label class="col-md-4 control-label upper" for="radios">Tiene Otras sucursales</label>
								<div class="col-md-4"> 
									<label class="radio-inline" for="radios-0">
										<input type="radio" name="sucursales" id="radios-0" value="1" checked="checked">
										Si
									</label> 
									<label class="radio-inline" for="radios-1">
										<input type="radio" name="sucursales" id="radios-1" value="2">
										No
									</label> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-11 sep-top-md">
								<small>*campos obligatorios</small>
								<button id="botonEnvia" type="submit" class="btn btn-success btn-block disabled">
									Enviar!
									<i class="glyphicon glyphicon-ok"></i>	
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10 sep-top-md">
								<h4><small>Al llenar la forma, un agente se comunicará con usted para agendar una cita dentro de las siguientes 8 horas hábiles.</small></h4>
							</div>
						</div>
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>