<section id="caracteristicas" class="sep-top-2x sep-bottom-2x">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="text-center">
					<h2 data-wow-delay="0.5s" class="upper wow bounceInLeft">
						<?=$carTitle;?>
					</h2>
					<p data-wow-delay="0.5s" class="lead wow bounceInRight">
						<?=$carP;?>
					</p>
				</div>
			</div>
		</div>
		<div id="filters" class="text-center sep-top-lg">
			<button data-filter="*" class="btn btn-sm btn-primary upper">plusvalia</button>
			<?php foreach($carFiltros as $filtro): ?>
			<button data-filter=".<?=$filtro;?>" class="btn btn-sm upper"><?=$filtro;?></button>
			<?php endforeach; ?>
		</div>
		<div class="sep-top-md">
			<ul id="isotope" class="portfolio isotope">
				<?php foreach( $carElems as $elem ): ?>
				<li class="item team-item <?=$elem['class'];?>">
					<div class="item-wrapper">
						<div class="sep-bottom-sm">
							<div class="team-photo">
								<div class="team-connection">
								</div>
							</div>
						</div>
						<div class="team-name">
							<h5 class="upper"><?=$elem['name'];?></h5><span><?=$elem['class'];?></span>
						</div>
						<p style="color:back">
							<?=$elem['p'];?>
						</p>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>