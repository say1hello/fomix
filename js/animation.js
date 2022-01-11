$(function() {
	function onScrollInit( items, trigger ) {
		items.each( function() {
			var osElement = $(this),
				osAnimationClass = osElement.attr('data-os-animation'),
				osAnimationDelay = osElement.attr('data-os-animation-delay');
				osElement.css({
					'-webkit-animation-delay':  osAnimationDelay,
					'-moz-animation-delay':     osAnimationDelay,
					'animation-delay':          osAnimationDelay
				});

			var osTrigger = ( trigger ) ? trigger : osElement;
			
			osTrigger.waypoint(function() {
				osElement.addClass('animated').addClass(osAnimationClass);
				},{
					triggerOnce: true,
					offset: '90%'
			});
		});
	}

	onScrollInit( $('[data-os-animation]') );

	// Digits Animation
	$('#digits1-animation').waypoint(function() {
		$(this)
			.prop('number', 1)
			.animateNumber(
				{
					number: 7,
				},
				3000
			);
	},{
		triggerOnce: true,
		offset: '90%'
	});

	var percent_number_step = $.animateNumber.numberStepFactories.append(' %');
	$('#digits2-animation').waypoint(function() {
		$(this)
			.prop('number', 1)
			.animateNumber(
				{
					number: 100,
					numberStep: percent_number_step
				},
				3000
			);
	},{
		triggerOnce: true,
		offset: '90%'
	});

	var space_separator_number_step = $.animateNumber.numberStepFactories.separator(' ');
	$('#digits3-animation').waypoint(function() {
		$(this)
			.prop('number', 4500000)
			.animateNumber(
				{
					number: 5000000,
					numberStep: space_separator_number_step
				},
				3000
			);
	},{
		triggerOnce: true,
		offset: '90%'
	});

	$('#digits4-animation').waypoint(function() {
		$(this)
			.prop('number', 1)
			.animateNumber(
				{
					number: 250,
				},
				3000
			);
	},{
		triggerOnce: true,
		offset: '90%'
	});
});