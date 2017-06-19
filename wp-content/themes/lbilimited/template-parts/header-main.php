<?php
	// First, some variables
		$link = '';
		$link_text = '';
		$title = '';
		$subtitle = '';
		$featured_image_frame = get_field('featured_image_framing');
		$content_class = 'header-content off ';
		$header_img = '';
		
		// Call global options data and establish variables for the template -- this pulls information from the theme options found in the appearance menu, as established in theme_options.php
		$options = get_option('lbilimited_options');
		
		// Check what type of page we're loading and set $content_class accordingly so we can dynamically style the content
		if( is_search() ){
			$title = 'Results:';
			$subtitle = get_search_query();
			$content_class .= ' search';
			$header_img = $options['results_header'];
			$header_img_id = get_image_id($header_img); // we're not retrieving an img object with $header_img here, just the url, so we need to go get the post ID of that image so we can retrieve the blur size
			$header_thumb_array = wp_get_attachment_image_src($header_img_id, 'blur'); // retrieves an array of image information for the 'blur' size of the $header_img
			$header_thumb = $header_thumb_array[0]; // gets the url of the 'blur' image
			$featured_image_frame = $options['results_frame'];
		}else if( is_front_page() ){
			$content_class .= ' home';
			$title      = get_field('header_title');
			$subtitle = 'Offering the finest services in classic car sales, brokerage, and collection management';
			$link_text  = get_field('call_to_action_text');
			$link       = get_field('call_to_action_link');
			$header_img = get_the_post_thumbnail_url();
			$header_thumb = get_the_post_thumbnail_url( $post->ID,'blur' );
// 			$subtitle = get_field('page_subtitle');
		}else if( is_single() ){
			$post_type = get_post_type();
			$content_class = 'header-content single';
			$title = offering_title();
			$price_val = get_field('price');
			$blueprint_url = get_template_directory_uri() . '/inc/images/blueprint.png';
			
			$framing = get_field('framing');
			$featured_file = get_field('featured_media');
			$featured_type = $featured_file['mime_type']; 
			$file_exp = explode("/",$featured_type);
			$file_type = $file_exp[0];
			$header_img = $featured_file['url'];
			$content_class .= " $framing";
			$featured_img = get_field('featured_image');
			$featured_img_url = $featured_img['url'];
			$feat_alt = $featured_img['alt'];
			
			
			if( $post_type = 'offerings' ){
				$photos_array = get_field('exterior_glam');
				$featured_img_url = $photos_array[0]['url'];
				$feat_alt = $photos_array[0]['alt'];
			}
			
			
		}else if( is_404() ) {
			$title = 'oooops!';
			$subtitle = 'Hey travler, you’ve gone to far. Click <a href="' . home_url() . '">here</a> to head back home.';
			$content_class .= ' e404';
			$header_img = $options['404_header'];
			$header_img_id = get_image_id($header_img); // we're not retrieving an img object with $header_img here, just the url, so we need to go get the post ID of that image so we can retrieve the blur size
			$header_thumb_array = wp_get_attachment_image_src($header_img_id, 'blur'); // retrieves an array of image information for the 'blur' size of the $header_img
			$header_thumb = $header_thumb_array[0]; // gets the url of the 'blur' image
			$featured_image_frame = $options['404_frame'];
		}else if( is_home() ){
			// the posts page needs the page ID to be set up sepperately 
			$post_id = get_option( 'page_for_posts' );
			$content_class .= ' page archive';
			$title = get_the_title( $post_id );
			$subtitle = get_field('page_subtitle');
			$header_img = get_the_post_thumbnail_url( $post_id, 'full' );
			$header_thumb = get_the_post_thumbnail_url( $post_id, 'blur' );
			$featured_image_frame = get_field('featured_image_framing', $post_id);
		}else {
			$content_class .= ' page';
			$title = get_the_title();
			$subtitle = get_field('page_subtitle');
			$header_img = get_the_post_thumbnail_url( $post->ID, 'full' );
			$header_thumb = get_the_post_thumbnail_url( $post->ID, 'blur' );
		}
		
	// Render Content
		if( is_single() ){ 
			
			/////////////////////////
			/// SINGLE POST PAGE ///
			///////////////////////
			
			echo "
				  <div class='featured-media-wrapper'>";
	
			if($file_type == 'video'){
				echo "<video class='' autoplay loop>
					 	<source src='$header_img' />
					 </video>";
			}
			if($featured_img) {
				echo "<img src='$featured_img_url' class='' alt='$feat_alt' />";	
			}
			echo "<div class='$content_class'>
				  	<h1>$title</h1>";
				  	if($price_val){
					  	$price = 'Offered at: $' . number_format($price_val,0,".",",");
					  	echo "<p class='price main-btn'>$price</p>";
				  	}  	
			echo  "</div></div>";
		}else {
			
			//////////////////////////
			///  ALL OTHER PAGES  ///
			////////////////////////
			
			// Embed Code and Button field for Media page
				$media_btn = get_field('button_text');
				$media_embed = get_field('button_iframe');
				$media_data = array(
					'iframe' => $media_embed
				);
				$media_json = json_encode($media_data);
				
		
			echo "<div class='b_image_wrapper'>
				  	<img src='$header_thumb' class='blur $featured_image_frame' />
				  	<img data-src='$header_img' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' class='full_size lazy-load $featured_image_frame' />
				  </div>
				  <div class='$content_class'>
				  	<h1>$title</h1>";

				  	if(is_front_page()){
					  	echo "<div class='sub_heading'>";
				  	}
				  	if($subtitle){
					  	echo "<p>$subtitle</p>";
				  	}
				  	if($link && $link_text){
					  	echo "<a href='$link' class='main-btn'>$link_text</a>";
				  	}
				  	if($media_btn && $media_embed){
					  	echo "<div class='main-btn video_trigger' data-item='$media_json'>$media_btn</div>";
				  	}
				  	if(is_front_page()){
					  	echo "</div>";
				  	}
				  	
			echo  "</div>"; // End .$content_class
			
			if( is_page_template('archive-lbi_media.php') ){
			  	echo "<div class='scroll_hint_container'>
			  			<span class='dot dot-1'></span>
			  			<span class='dot dot-2'></span>
			  			<span class='dot dot-3'></span>
			  		  </div>";
		  	}
		
		}
