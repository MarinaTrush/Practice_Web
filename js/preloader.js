$(window).on('load', function () {
	$preloader = $('.preloader'),
	$loader = $preloader.find('.preloader__image');
	$loader.fadeOut();
	$preloader.delay(500).fadeOut('slow');
});