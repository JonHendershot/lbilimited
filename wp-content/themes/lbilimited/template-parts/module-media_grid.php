<?php
	// Run the loop with the $all_args arguments to display all the content
		$query = new WP_Query( $all_args );
		while( $query->have_posts() ) : $query->the_post();
			// Variables
					$title = get_the_title();
					$video_embed_html = get_field('video_embed_code'); // will return valid html, if provided
					$video_embed = html_entity_decode($video_embed_html); // we have to conver the html object into a plain string so that it can be stored in the JSON array, otherwise the double quotes in the iframe will not be escaped, causing invalid JSON
					$post_ID = get_the_ID();
					$background_image = get_the_post_thumbnail_url();
					$item_info = array(
						'video_id' => $post_ID,
						'video_title' => $title,
						'iframe' => $video_embed
					);
				
				// Store $item_info as json array to store in markup
					$item_data = array_map("utf8_encode", $item_info); // ensure data is in utf8
					$item_json = json_encode($item_data);
		
			// Export Content
				echo "<div class='grid-item' data-item='$item_json'>
						<div class='item-content dash-title'>
							<h3>$title</h3>
							<div class='video_trigger'>view more</div>
						</div>
						<img src='$background_image' />
					  </div>";
		
	// End loop and reset query 
		endwhile;
		wp_reset_query();
		
	// Close the section