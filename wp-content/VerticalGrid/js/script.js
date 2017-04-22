(function verticalGrid($){
	$('img').each(function(){
		var image = $(this),
			wrapper = image.parent(),
			imgW = image.width(),
			imgH = image.height(),
			wrapperW = wrapper.width(),
			wrapperH = wrapper.height();
			
		if(imgH < wrapperH){
			image.css({'height':'100%','width':'auto'});
		}	
	});
}(jQuery));