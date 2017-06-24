<?php
	
	// Setup :: Establish post loop information
		$args = array(
				'post_type' => 'lbi_media',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => -1
			);
		$query = new WP_Query( $args );
	
	// Settings :: Used to create number of elements and create a ceiling 
		$iterations = $query->post_count; // Max Number
		$post_num = $query->post_count; // Number of Elements 
		$gutter = 'gutter-0px'; // Set gutter distance with "gutter-XXpx" where XX is the distance you want between items, in px

	
	// Preparation :: Setup Grid Numbers to ensure the last row is full [used for evaluation in Display Logic]
		$grid_lock = array(
			"grid_a" => array(
					"key" => "norm",
					"values" => array() 
				),
			"grid_b" => array(
					"key" => "alt",
					"values" => array() 
				),
			"grid_c" => array(
					"key" => "alt-inv",
					"values" => array() 
				),
			"grid_d" => array(
					"key" => "r-1",
					"values" => array() 
				),
			"grid_e" => array(
					"key" => "r-2",
					"values" => array()
			)
		);
	
	// Evaluation :: Push in to arrays
		for($nn = 5; $nn <= $iterations; $nn++){
			if($nn % 3 == 0){ // is divisible by 3
				$grid_lock["grid_a"]["values"][] = $nn;
			} else if($nn % 5 == 0 || $nn % 5 === 3){
				$grid_lock["grid_b"]["values"][] = $nn;
			} else if($nn % 5 == 2){
				$grid_lock["grid_c"]["values"][] = $nn;
			} else if($nn % 3 == 1){
				$grid_lock["grid_d"]["values"][] = $nn;
			} else if($nn % 3 == 2){
				$grid_lock["grid_e"]["values"][] = $nn;
			} else { // catchall
				$grid_lock["grid_f"]["values"][] = $nn;
			}
		}

// Display Arrays
/*
	echo "<pre>";
	print_r($grid_lock);
	echo "</pre>";
*/
	
	// Display Logic :: Check post count in arrays and setup class
		foreach($grid_lock as $set){
			if(in_array($post_num, $set["values"])){
				$display_class = $set["key"];
			}
		}

	// Loop: Create Container, Begin Loop, and Create Items
		echo "<div class='gridlock-container $gutter'>";
			while( $query->have_posts() ) : $query->the_post(); 
			
				// Variables
					$title = get_the_title();
					$media_type = get_field('media_type');
					$post_ID = get_the_ID();
					$background_image = get_the_post_thumbnail_url();
					
					
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
						
						foreach( $gallery as $key=>$photo ){
							$blur_url = $photo['sizes']['blur'];
							$full_url = $photo['sizes']['large'];
							
							$item_info[] = array(
								'full_url' => $full_url,
								'blur_url' => $blur_url,
								'photo_id' => $key
							);
						}
						
						$trigger_class = 'photo_trigger';
						$trigger_text = 'View Photos';
					}
				
				// Store $item_info as json array to store in markup
// 					$item_data = array_map("utf8_encode", $item_info); // ensure data is in utf8
					$item_json = json_encode($item_info);

				
				// Output elements	
					echo "<div class='grid-item $trigger_class $display_class $gutter' style='background-image: url($background_image)' data-item='$item_json'>
							<div class='item-content dash-title'>
								<h3>$title</h3>
								<div class='trigger video_trigger'>$trigger_text</div>
							</div>
						  </div>";
			endwhile;
		echo "</div>";
