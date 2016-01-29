<nav id="main-navigation" role="navigation" class="navbar navbar-fixed-top navbar-standard">
	<!-- BUSCADOR INTERNO -->
	<!-- aqui :) -->
	<!-- BUSCADOR INTERNO -->
	<div class="container">
		<!-- Logo -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle"><i class="fa fa-align-justify fa-lg"></i></button>
			<a href="<?=base_url();?>/" class="navbar-brand">
				<img src="<?=base_url();?>/imgs/logo-white.png" alt="" class="logo-white">
				<img src="<?=base_url();?>/imgs/logo.png" alt="" class="logo-dark">
			</a>
		</div>
		<!-- End logo -->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right service-nav">
				<!-- Login form -->
				<?=$logFormUserLinks;?>
				<!-- End login form -->
				<?php if($sessionActiva): ?>
				<!-- register Link -->
				<li>
					<a id="dropdownMenuLogin" href="<?=base_url('register');?>" title="Registrate para que puedas apoyar o crear un campaña en Fondea.org">
						Registrar
					</a>
				</li>
				<!-- End register Link -->
				<?php endif; ?>
				<!-- ligas de cambio de lenguaje -->
				<li>
					<a href="<?=base_url('home/lang/spanish');?>">
						ES
					</a>
				</li>
				<li>
					<a href="<?=base_url('home/lang/english');?>">
						EN
					</a>
				</li>
				<!-- End ligas de cambio de lenguaje -->
			</ul>
			<button type="button" class="navbar-toggle"><i class="fa fa-close fa-lg"></i></button>
			<!-- ligas izquierdas genericas -->
			<ul class="nav yamm navbar-nav navbar-left main-nav">
				<li>
					<a href="<?=base_url('descubrir');?>" title="Consulta las categorias y los proyectos que conforman Fondea" id="menu_item_0" data-ref="#" >
						Descubrir
					</a>
				</li>
				<li>
					<a href="<?=base_url('como-funciona');?>" title="¿Como funciona Fondea.org?" id="menu_item_1" data-ref="#" >
						¿Como funciona?
					</a>
				</li>
				<li>
					<a href="<?=base_url('socios');?>" title="Socios que forman parte de Fondea.org" id="menu_item_2" data-ref="#" >
						Socios
					</a>
				</li>
				<?php if($sessionActiva): ?>
				<!-- liga Crear Proyecto -->
				<li >
					<a href="http://fondea.hugo/crea-proyecto" title="" id="menu_item_3" data-ref="#">
						Crear Proyecto
					</a>
				</li>
				<!-- End liga Crear Proyecto -->
				<?php endif; ?>				
			</ul>
			<!-- End ligas izquierdas genericas -->
		</div>
	</div>
</nav>