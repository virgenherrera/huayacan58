<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title;?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$meta;?>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory-->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,300,400,600,700">
	<link rel="stylesheet" href="<?=$public;?>styles/font-awesome.css">
	<link rel="stylesheet" href="<?=$public;?>styles/owl.carousel.css">
	<link rel="stylesheet" href="<?=$public;?>styles/owl.theme.css">
	<link rel="stylesheet" href="<?=$public;?>styles/slit-slider-style.css">
	<link rel="stylesheet" href="<?=$public;?>styles/slit-slider-custom.css">
	<link rel="stylesheet" href="<?=$public;?>styles/idangerous.swiper.css">
	<link rel="stylesheet" href="<?=$public;?>styles/yamm.css">
	<link rel="stylesheet" href="<?=$public;?>styles/animate.css">
	<link rel="stylesheet" href="<?=$public;?>styles/prettyPhoto.css">
	<link rel="stylesheet" href="<?=$public;?>styles/bootstrap-slider.css">
	<link rel="stylesheet" href="<?=$public;?>styles/device-mockups2.css">
	<link rel="stylesheet" href="<?=$public;?>styles/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$public;?>styles/main.css">
	<link rel="stylesheet" href="<?=$public;?>styles/main-responsive.css">
	<link id="primary_color_scheme" rel="stylesheet" href="<?=$public;?>styles/theme_sangria.css">
	<?=$headLink;?>
	<script src="<?=$public;?>scripts/vendor/modernizr.js"></script>
	<?=$headScript;?>
	<noscript>
		<link rel="stylesheet" href="<?=$public;?>styles/styleNoJs.css">
		<?=$NoScript;?>
	</noscript>
</head>
	
<body>

<div id="load"></div>

<!--[if lt IE 9]>
	<p class="browsehappy">
		You are using an strong outdated browser. <br>Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
	</p>
<![endif]-->

<!-- Start MAIN page container -->
<div class="page">
	<!-- Start Nav Section-->
	<?=$navbar;?>
	<!-- END Nav Section-->
	
	<?=$content;?>
	
	<!-- Start Footer section-->

	<!-- End Footer section-->

	<!-- Back to top -->
	<div id="back_to_top">
		<a href="#" class="fa fa-arrow-up fa-lg">
		</a>
	</div>
	<!-- End Back to top -->

	<!-- Start modal section-->
	<?=$modal;?>
	<!-- End modal section-->

	<!--if lt IE 7
	p.browsehappy
		| You are using an
		strong outdated
		| browser. Please
		a(href='http://browsehappy.com/') upgrade your browser
		| to improve your experience.
	-->
</div>
<!-- END MAIN page container -->

<!-- postBody stylesheets -->
<?=$postStylesheet;?>
<!-- END postBody stylesheets -->

<!-- postBody Js -->
<script src="<?=$public;?>scripts/vendor/jquery.js"></script>
<script src="<?=$public;?>scripts/vendor/queryloader2.min.js"></script>
<script src="<?=$public;?>scripts/vendor/owl.carousel.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.ba-cond.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.slitslider.js"></script>
<script src="<?=$public;?>scripts/vendor/idangerous.swiper.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.fitvids.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.countTo.js"></script>
<script src="<?=$public;?>scripts/vendor/TweenMax.min.js"></script>
<script src="<?=$public;?>scripts/vendor/ScrollToPlugin.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.scrollmagic.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.easypiechart.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.validate.js"></script>
<script src="<?=$public;?>scripts/vendor/wow.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.placeholder.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.easing.1.3.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.waitforimages.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.prettyPhoto.js"></script>
<script src="<?=$public;?>scripts/vendor/imagesloaded.pkgd.min.js"></script>
<script src="<?=$public;?>scripts/vendor/isotope.pkgd.min.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.fillparent.min.js"></script>
<script src="<?=$public;?>scripts/vendor/raphael-min.js"></script>
<script src="<?=$public;?>scripts/vendor/bootstrap.js"></script>
<script src="<?=$public;?>scripts/vendor/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?=$public;?>scripts/vendor/bootstrap-slider.js"></script>
<script src="<?=$public;?>scripts/vendor/bootstrap-rating-input.js"></script>
<script src="<?=$public;?>scripts/vendor/bootstrap-hover-dropdown.min.js"></script>
<script src="<?=$public;?>scripts/jquery.gmap.min.js"></script>
<script src="<?=$public;?>scripts/circle_diagram.js"></script>
<script src="<?=$public;?>scripts/main.js"></script>
<script src="<?=$public;?>scripts/validador.js"></script>
<script>
	$("p").css("color","black");
</script>
<?=$postScript;?>
<!-- postBody Js -->
</body>
</html>

<!-- Start Nav Section-->
