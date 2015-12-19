$(function() {
	//TOPページslider
	$('#MainImage').bxSlider({
		auto: true,
		pager: true,
		easing:  'easeOutQuint',
		responsive:true,
		speed: 1500,
		pause:  8000,
		controls:false
	});
	$('#top-main .pager-link').wrapInner('<span></span>');

});
