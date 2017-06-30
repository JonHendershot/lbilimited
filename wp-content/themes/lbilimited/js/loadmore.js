(function ajax_load_more($){
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts
 
	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': load_more_params.posts,
			'page' : load_more_params.current_page
		},
			archiveOffset = $('#archive-wrapper').offset().top,
			archiveBottomOffset = archiveOffset + $('#archive-wrapper').height() - $(window).height(); // subtract window height to detect when the bottom of the wrapper will hit the botom of viewport, not top
// 		console.log( 'Scrolled: ' +  $(document).scrollTop() + ' | Archive Bottom: ' + archiveBottomOffset );

		if( $(document).scrollTop() > ( archiveBottomOffset - bottomOffset ) && canBeLoaded == true ){
// 			console.log('fired ajax');
			$.ajax({
				url : load_more_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
					console.log(data);
				},
				success:function(data){
					if( data ) {
						$('#archive-wrapper').find('article:last-of-type').after( data ); // where to insert posts
						canBeLoaded = true; // the ajax is completed, now we can run it again
						load_more_params.current_page++;	
					}
					
				}
			});
		}
	});
}(jQuery));