<!-- Start Portfolio section-->
<section id="requisitos" class="sep-top-3x">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="section-title">
					<h2 class="bordered-left upper wow flipInX">
						<?=$abouttitle;?>
					</h2>
					<p class="lead wow flipInX">
						<?=$aboutp;?>
					</p>
				</div>
			</div>
			<div class="col-md-8">
				<div class="device-content">
					<div data-device="ipad" data-orientation="landscape" data-color="white" class="device-mockup">
						<div class="device">
							<div class="screen">
								<div data-navitagion="false" data-slide-speed="300" data-pagination-speed="400" data-single-item="true" data-auto-height="true" data-auto-play="true" class="owl-carousel owl-theme">
									<!-- Start Item Slide-->
									<?php foreach($aboutGal as $aboutpic): ?>
									<div class="item">
										<img src="<?='/public/fotos/'.$aboutpic;?>" alt="" class="img-responsive">
									</div>
								<?php endforeach; ?>
									<!-- End Item Slide-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-primary sep-top-md sep-bottom-md">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<p class="lead x2 light wow bounceInLeft">
						<?=$aboutp2;?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Portfolio section-->