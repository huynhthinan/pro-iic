(function($) {

// fadeToggle sub-menu
	$(function(){
		$(".sub-menu").css('display', 'none');
		$("#primary-menu li").hover(function(){
			$(this).children('ul').stop().fadeToggle('fast');
		});
	});

})(jQuery);


