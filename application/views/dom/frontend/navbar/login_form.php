<li>
	<a id="dropdownMenuLogin" href="#" data-toggle="dropdown" class="upper dropdown-toggle" title="Inicia sesión apoya y crea un campaña en Fondea.org">
		Login
	</a>
	<div aria-labelledby="dropdownMenuLogin" class="dropdown-menu widget-box">
		<form action="http://fondea.hugo/login/login" method="post" accept-charset="utf-8">
			<div class="form-group">
				<input type="hidden" name="direccion" value="home">
				<label class="sr-only">Usuario o email</label>
				<input type="text" value="" placeholder="Usuario or email" name="cliente" class="form-control input-lg">
			</div>
			<div class="form-group">
				<label class="sr-only">Password</label>
				<input type="password" value="" placeholder="Password" name="password" class="form-control input-lg">
			</div>
			<div class="form-inline form-group">
				<button type="submit" class="btn btn-primary btn-xs down-bottom-md">Inicia sesion</button>
				<a href="http://fondea.hugo/home/remember"><br>
					<small>Olvidaste tu Password?</small>
				</a>
				<div class="checkbox">
					<label>
						<!--<input type="checkbox"><small> Remember me</small>-->
					</label>
				</div>
			</div>
			<label>
			<br>
			<h5>Inicia con tu red social.</h5>
			</label>
			<div class="form-inline form-group">
				<a href="http://fondea.hugo/hauth/login/Facebook" class="btn btn-facebook btn-xs">
					<i class="fa fa-facebook-square fa-2x"></i>
				</a>
				<a href="http://fondea.hugo/hauth/login/Google" class="btn btn-danger btn-xs">
					<i class="fa fa-google fa-2x"></i>
				</a>
				<a href="http://fondea.hugo/hauth/login/Twitter" class="btn btn-info btn-xs">
					<i class="fa fa-twitter-square fa-2x"></i>
				</a>
				<label>
					<small>Nunca publicaremos algo en tus redes sociales sin tu permiso.</small>
				</label>
			</div>
		</form>
	</div>
</li>