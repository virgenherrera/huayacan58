<section id="descripcion" itemscope >
	<div class="container">
		<div class="row">
			<!-- Start proyImagen/proyGaleria-->
			<div class="col-md-5 sep-top-2x sep-bottom-2x">
				<!-- project Main image -->
				<div class="product-images">
					<img title="" alt="" src="<?=$ImagenP;?>" style="width:100%" itemprop="image" class="img-responsive">
				</div>
				<!-- project Main image -->
				<!-- project Galery -->
				<div class="product-thumbnails">
					<h4 class="text-uppercase upper">
						galleria
					</h4>
					<?php foreach($aboutGal as $pic): ?>
					<a href="/public/fotos/<?=$pic;?>" data-rel="prettyPhoto[pp_gal]" title="Palmaris58" class="zoom first">
						<img title="" alt="" src="/public/fotos/<?=$pic;?>" class="img-responsive">
					</a>
					<?php endforeach; ?>
				</div>
				<!-- project Galery -->
			</div>
			<!-- End proyImagen/proyGaleria-->

			<!-- Start Content-->
			<div class="col-md-7 sep-top-lg">
				<div class="main-product-title">
					<!-- project Title -->
					<h2>
						<span itemprop="name">
							<?=$headertitulo;?>
						</span>
						<small itemprop="brand">
							<?=$headersubtitulo;?>
						</small>
					</h2>
					<!-- project Title -->
				</div>
				<!-- project Description -->
				<div itemprop="description" class="sep-top-sm">
					<p class="lead"> 
					</p>
					<h5>Descripción.</h5>
					<h6>Estacionamiento:</h6>
					<ul>
						<li>7 Lugares de Frente.</li>
						<li>18 Cajones de Estacionamiento Subterráneo.</li>
					</ul>
					<h6>Planta Baja:</h6>
					<ul>
						<li>Superficie total disponible 360 metros cuadrados, con posibilidad de dividirse en 4 locales comerciales.</li>
						<li>Cada Local tiene una superficie de 90 metros cuadrados. 6.5 x 14</li>
						<li>Altura libre 3.8 metros.</li>
						<li>Preparaciones para sanitarios.</li>
						<li>Preparación para medidor de luz independiente para cada local.</li>
						<li>Cisterna común para la plaza de 60m3 y 3 tinacos.</li>
						<li>Vidrios con protección UV y tecnología SOLITE para ahorro de energía y control solar.</li>
					</ul>
					<h6>
						Planta Alta: <small>RENTADO</small>
					</h6>
					<hr>
					<h2 class="bordered-left upper wow flipInX sep-top-sm sep-bottom-md">
						<?=$abouttitle;?>
					</h2>
					<br>
					<p style="color:back">
						<?=$aboutp;?>	
					</p>
				</div>
				<!-- project Description -->
			</div>
			<!-- End Content-->
		</div>
	</div>
</section>