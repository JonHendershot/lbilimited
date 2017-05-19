jQuery(window).load(function(){
	var $ = jQuery;
	
	$('.lazy-load').each(function(){
		lazyLoader( $(this) );
	});
});

(function carousel($){
	$('.owl-carousel').owlCarousel({
		items: 1,
		nav: false,
		dots: true,
		dotsEach: true,
		autoplay: false,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		autoHeight: true
	});
}(jQuery));

(function searchTrigger($){
	$('.search_trigger').click(function(){
		if( ! $(this).hasClass('open')){
			
			// Display Search Form
			$('.search_form_container').addClass('visible');
			$('.search_trigger.header').text('Click to close').addClass('open');
			setTimeout(function(){
				$('.search_form_container').find('input[type="search"]').focus();
			}, 500);  
			
		}else {
			
			// Animate Off
			$('.search_form_container').find('input[type="search"]').focusout();
			$('.search_trigger.header').text('click to search').removeClass('open');
			$('.search_form_container').removeClass('visible');
		}
		
	});
}(jQuery));

function lazyLoader(img){
	var src = img.attr('data-src'),
		loader = new Image();
		loader.src = src;
		loader.onload = function(){
			img.attr('src',src); 
			img.addClass('visible');	
		};
	
}