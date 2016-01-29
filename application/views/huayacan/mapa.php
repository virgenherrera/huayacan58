<section id="mapa">
<div class="row sep-top-sm sep-bottom-sm">
	<div class="col-md-6 col-md-offset-6">
		<h2 class="upper">ubicación</h2>
	</div>
</div>
	<div id="map-canvas" style="height:500px">
		<script>
			var
				lat = 21.113993,
				lon = -86.850346,
				infoText = [
					'<div style="white-space:nowrap">',
						'<h5><?=$nombre;?></h5>',
						'Palmaris #58 ,<br>',
						'Av. Huayacan, Cancun Quintntana Roo<br>',
						'México CP 77500',
					'</div>'
				],
				mapOptions = {
					scrollwheel: false,
					markers: [
						{ latitude: lat, longitude: lon, html: infoText.join('') }
					],
					icon: {
						image: '/public/img/themes/sangria/marker.png',
						iconsize: [72, 65],
						iconanchor: [12, 65],
					},
					latitude: lat,
					longitude: lon,
					zoom: 16
				};
		</script>
	</div>
</section>