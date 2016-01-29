<section id="home" class="demo-1">
	<!--		 Codrops top bar-->
	<div id="slider" class="sl-slider-wrapper">
		<div class="sl-slider">
			<?php
				$contador = 0;
				foreach( $slider as $slide ){ 
					$contador++;
				?>
			<!-- start slide-->
			<div data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2" class="sl-slide">
				<div style="background-image: url(/public/fotos/<?=$slide;?>);" class="sl-slide-inner">
					<span id="nigga" style="background-color: rgba(0, 0, 0, 0.37);content: '';display: block;height: 100%;position: absolute;width: 100%;">
						<div class="slide-container">
							<div class="slide-content text-center">
								<h2 class="main-title">
									<?=$headertitulo;?>;<span class="text-primary"></span>
								</h2>
								<h3 style="color:white">
									<?=$headersubtitulo;?>
								</h3>
							</div>
						</div>
					</span>
				</div>
			</div>
			<!-- end slide-->
		<?php } ?>
		</div>
		<!--			 /sl-slider-->
		<nav id="nav-arrows" class="nav-arrows"><span class="nav-arrow-prev">Anterior</span><span class="nav-arrow-next">Siguiente</span></nav>
		<nav id="nav-dots" class="nav-dots">
			<?php 
				for ($i=0; $i < $contador; $i++) { 
					if($i==0){
						echo '<span class="nav-dot-current"></span>';
					}
					else{
						echo '<span></span>';
					}
				}
			?>
		</nav>
	</div>
	<!--		 /slider-wrapper-->
</section>