<?php
	
	// Setup :: Establish post loop information
		$args = array(
			'post_type' => 'collection',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$query = new WP_Query( $args );
	
	// Settings :: Used to create number of elements and create a ceiling 
		$iterations = $query->post_count; // Max Number
		$post_num = $query->post_count; // Number of Elements 
		$gutter = 'gutter-10px'; // Set gutter distance with "gutter-XXpx" where XX is the distance you want between items, in px

	
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
		echo "<div class='gridlock-container $gutter collection-grid'>";
			while( $query->have_posts() ) : $query->the_post(); 
			
				// Establish Some item-specific variables first
					$title = offering_title();
					$image_file = get_field('featured_image');
					$image = $image_file['sizes']['large'];
					$link  = get_permalink();
				
				// Output elements	
					echo "<a href='$link' class='grid-item $display_class $gutter waypoint' data-padding='100' style='background-image: url($image)'>
							<div class='item-content dash-title'>
								<h3>$title</h3>
								<div class='trigger video_trigger'>View More</div>
							</div>
						  </a>";
			endwhile;
		echo "</div>";
