<?php
	
	// Setup :: Establish post loop information
		$args = array(
				'post_type' => 'specialists',
				'order' => 'ASC',
				'posts_per_page' => -1,
				'orderby' => 'menu_order'
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
				"key" => "norm_3",
				"values" => array() 
			),
		"grid_c" => array(
				"key" => "alt",
				"values" => array() 
			),
		"grid_d" => array(
				"key" => "alt-inv",
				"values" => array() 
			),
		"grid_e" => array(
				"key" => "r-1",
				"values" => array()
		),
		"grid_f" => array(
				"key" => "r-2",
				"values" => array()
		),
		"grid_g" => array(
				"key" => "r-3",
				"values" => array()
		)
	);
	
	// Evaluation :: Push in to arrays
	for($nn = 5; $nn <= $iterations; $nn++){
		if($nn % 4 == 0){ // is divisible by 4
			$grid_lock["grid_a"]["values"][] = $nn;
		} else if($nn % 3 == 0 ){
			$grid_lock["grid_b"]["values"][] = $nn;
		} else if($nn % 7 == 0 || $nn % 7 == 4){
			$grid_lock["grid_c"]["values"][] = $nn;
		} else if($nn % 7 == 3){
			$grid_lock["grid_d"]["values"][] = $nn;
		} else if($nn % 4 == 1){
			$grid_lock["grid_e"]["values"][] = $nn;
		} else if( $nn % 4 == 2 ){ 
			$grid_lock["grid_f"]["values"][] = $nn;
		} else if($nn % 4 == 3 ){
			$grid_lock["grid_g"]["values"][] = $nn;
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
		
	// Begin Loop - display specialist
		$specialist_id = 0; // start with 0 so that the ID will match array positions
		$quotes = array(); // intialize array to store quote information so that we don't need to loop for it again later

	// Loop: Create Container, Begin Loop, and Create Items
		echo "<div class='gridlock_2-container specialists_wrapper $gutter'>";
			while( $query->have_posts() ) : $query->the_post(); 
			
				// Establish Variables for this Specialist
				$name = get_the_title();
				$position = get_field('specialist_position');
				$photo_full = get_the_post_thumbnail_url( $post->ID, 'full');
				$photo_blur = get_the_post_thumbnail_url( $post->ID, 'blur');
				$bio = utf8_encode( get_the_content() );
				$clean_bio = str_replace("'", "\u2019", $bio);
				$video_iframe = get_field('specialist_video');
				$quote = get_field('specialist_quote');
				$signature = get_field('specialist_signature');
				
				// Update Specialist Class
					$specialist_class = "specialist_item specialist-$specialist_id";
				
				// The quotes are going to be in a different section, outside of this loop
				// so we'll store them in their own array to access them later without having
				// to run through another loop to collect them
					$quotes[] = array(
						'id' => $specialist_id,
						'name' => $name,
						'position' => $position,
						'quote' => $quote,
						'signature_file' => $signature['url']
					);
				
				// To display the specialist's information upon a user clicking 'view more',
				// we'll need to heavily manipulate this information in the DOM based on user
				// interaction, so we're going to store the info we'll use in an array, turn it into
				// a json object, and store it in the markup so we can later access it with
				// javascript
					$specialist_array = array(
						'id' => $specialist_id,
						'name' => $name,
						'position' => $position,
						'photo_full' => $photo_full,
						'photo_blur' => $photo_blur,
						'bio' => $bio,
						'video_iframe' => $video_iframe
					);
					$specialist_data = array_map("utf8_encode",$specialist_array); // ensure a utf8 encode
					$specialist_json = json_encode($specialist_data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); // options ensure tags, apostraphes, quotes, ampersands, etc are converted to unicode 
				
		// Loop Export of Specialist Grid Items 
			echo "<div class='$specialist_class $display_class $gutter grid-item' data-self='$specialist_json' style='background-image: url($photo_full)'>
					<div class='specialist_content dash-title'>
						<h3>$name</h3>
						<p>$position</p>
					</div>
					<span class='view_more'>click to view more</span>
				  </div>";
	?>
		
		
<?	// End Specialists While Loop & Increment Specialist ID	
		$specialist_id++;	
			endwhile;
		echo "</div>";
