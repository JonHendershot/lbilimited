<?php
	
	// Template Name: Media House
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Media house content 
	// The content loop will be based off of the _________ post type
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	  ////////////////////
	 // Page Variables //
	////////////////////
	
		// Featured Media
			$featured_args = array(
				'post_type' => 'lbi_media',
				'cat' => 9,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => -1
			);
	
		// Sub-Heading
			$sub_title = get_field('media_sub_title');
			$sub_content = get_field('media_sub_content');
			$sub_photo = get_field('media_sub_photo');
			$sub_photo_url = $sub_photo['url'];
	
		// All Media
			$all_args = array(
				'post_type' => 'lbi_media',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => -1
			);
		
		// Media Suggestion
			$suggest_title = get_field('suggestion_title');
			$suggest_form_shortcode = get_field('suggestion_form');
			$suggest_form = do_shortcode($suggest_form_shortcode);
		
		
	  ////////////////////////	
	 // Invoke site header //
	////////////////////////
		get_header();
		
	
	  ///////////////////////////	
	 // Featured Content Loop //
	///////////////////////////
	
		// Begin Loop Wrappers
			echo "<section class='featured_gallery'>
					<div class='tilt_title_wrapper waypoint' data-padding='100'><h4 class='tilt_title flip'><span>featured gallery</span></h4></div>
					<div class='owl-carousel media_carousel featured_media'>";
					
		// Begin Loop
			$query = new WP_Query($featured_args);
			$loop_index = 1;
			while( $query->have_posts() ) : $query->the_post();
				
			
				// Variables
					$title = get_the_title();
					$media_type = get_field('media_type');
					$post_ID = get_the_ID();
// 					$background_image = get_the_post_thumbnail_url();
					$background_image = get_the_post_thumbnail();
					
					$display_class = '';
					
				// Check what type of media it is and establish the triggers and json info accordingly
					if( $media_type == 'video' ){
						
						$video_embed_html = get_field('video_embed_code'); // will return an valid html, if provided
						$video_embed = html_entity_decode($video_embed_html); // we have to conver the html object into a plain string so that it can be stored in the JSON array, otherwise the double quotes in the iframe will not be escaped, causing invalid JSON
						$item_info = array(
							'video_id' => $post_ID,
							'video_title' => $title,
							'iframe' => $video_embed
						);
						
						$trigger_class = 'video_trigger';
						$trigger_text = 'Watch Video';
						
					}else {
						$gallery = get_field('photo_gallery');
						
						$item_info = array();
						
/*
						foreach( $gallery as $key=>$photo ){
							$blur_url = $photo['sizes']['blur'];
							$full_url = $photo['sizes']['large'];
							
							$item_info[] = array(
								'full_url' => $full_url,
								'blur_url' => $blur_url,
								'photo_id' => $key,
								'img_class' => $post_ID
							);
						}
*/
						
						$item_info[] = array(
							'full_url' => $gallery[0]['sizes']['large'],
							'blur_url' => $gallery[0]['sizes']['blur'],
							'photo_id' => 0,
							'img_class' => "gallery-$post_ID"
						);
						
						$trigger_class = 'photo_trigger';
						$trigger_text = 'View Photos';
					}
				
				// Store $item_info as json array to store in markup
// 					$item_data = array_map("utf8_encode", $item_info); // ensure data is in utf8
					$item_json = json_encode($item_info);
					
				// If we're on the 3rd element, we need a class to control the proper display
					if( $loop_index === 2 ){
						$display_class='next';
					}
										

					
			
				// Render content here
					echo "<div class='featured_media_wrapper $display_class post-$post_ID waypoint' data-padding='200'>
							<div class='image_container'>
								$background_image
							</div>
							<div class='featured_media_title dash-title'>
								<h3>$title</h3>
							</div>
							<div class='trigger $trigger_class main-btn' data-id='$post_ID' data-item='$item_json'>$trigger_text</div>
						  </div>";
					  
		// End loop and reset query
			$loop_index++;
			endwhile;
			wp_reset_query();
			
		// Close Loop Wrappers		
			echo	"</div>
				  </section>";


	  /////////////////
	 // Sub Heading //
	/////////////////
	
		$sub_content = span_per_word($sub_content);
		echo "<section class='sub_heading media_sub'>
				<div class='media_sub_img' style='background-image:url($sub_photo_url)'></div>
				<div class='media_sub_content waypoint' data-padding='200'>
					<h3 class='media_sub_title'>$sub_title</h3>
					<p>$sub_content</p>
				</div>
			</section>";
			

	  ////////////////////
	 // Content Filter //
	////////////////////
	
// 		get_template_part('template-parts/module', 'search_bar');

	  //////////////////
	 // Content Loop //
	//////////////////

	// Setup the content section
		echo "<section class='lbi_media_container'>";

			get_template_part('template-parts/module', 'gridlock_media');	
			
		echo "</section>";
		wp_reset_query();

	  ///////////////////////
	 // Media Suggestions //
	///////////////////////
	
		echo "<section class='media_suggestion'>
			  	<div class='suggestion_title waypoint' data-padding='50'>
			  		<h3>$suggest_title</h3>
			  	</div>
			  	<div class='suggestion_form contact_form waypoint' data-padding='200'>
			  		$suggest_form
			  	</div>
			  </section>";
			  
			  
	// Add gallery sliders to end of page		  
			  	// Load gallery images into a specific slider -- all to be lazyloaded
				// this could get really bloaded - load test this
/*
				$gallery_classes = array(
					'gallery-$post_id'
				);
				$gallery_slider = gallery_slider( $gallery, $post_ID, 0, $gallery_classes);
				echo $gallery_slider;	
*/	  
	// Invoke site footer
		get_footer();
?>