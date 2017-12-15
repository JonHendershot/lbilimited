(function ajax_load_more($){

	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts
 
	
	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': load_more_params.posts,
			'page' : load_more_params.current_page
		},
			timestamp = Date.now(),
			archiveOffset = $('#archive-wrapper').offset().top,
			archiveBottomOffset = archiveOffset + $('#archive-wrapper').height() - $(window).height(); // subtract window height to detect when the bottom of the wrapper will hit the botom of viewport, not top
// 		console.log( 'Scrolled: ' +  $(document).scrollTop() + ' | Archive Bottom: ' + archiveBottomOffset );

		if( $(document).scrollTop() > ( archiveBottomOffset - bottomOffset ) && canBeLoaded == true ){
// 			console.log('fired ajax');

			$('#archive-wrapper .loading_notification').removeClass('hidden');
			
			$.ajax({
				url : load_more_params.ajaxurl + '?' + timestamp,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
				},
				success:function(data){
					
					$('#archive-wrapper .loading_notification').addClass('hidden');
	
					if( data ) {
						$('#archive-wrapper').find('#post-loader').before( data ); // where to insert posts
						canBeLoaded = true; // the ajax is completed, now we can run it again
						load_more_params.current_page++;	
						
						
						$('#archive-wrapper .lazy-load').each(function(){
							lazyLoader( $(this) );
						});
						
					}
					
				}
			});
		}
	});
	
}(jQuery));
