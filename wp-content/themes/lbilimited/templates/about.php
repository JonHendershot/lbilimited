<?php
	
	// Template Name: About
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the About LBI content
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Page Variables
		$hero_quote        = get_field('value_hero_quote');
		$hero_img          = get_field('value_hero_image');
	
	// Invoke site header
		get_header();
	
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
		
	// Hero Quote
?>
	<section class="lbi_values">
		<header class="values_hero" style="background-image: url(<?php echo $hero_img['url']; ?>)">
			<h2><?php echo $hero_quote; ?></h2>
		</header>
		<div class="value_wrapper">
			<?php
			
				// Loop to display values
					for($vv = 1; $vv <= 6; $vv++){
						// Setup Variables
							$value_title_str = "value_title_$vv";
							$value_content_str = "value_body_$vv";
							$value_title = get_field($value_title_str);
							$value_content = get_field($value_content_str);
							$value_class = 'value';
							
							if($vv == 1){
								$value_class .= ' active';
							}
						// Output Content
							if($value_title && $value_content){
								echo "<article class='$value_class'>
										<div class='value_content'>
										  	<h3>$value_title</h3>
										  	<p>$value_content</p>
										</div>
									  </article>";
							}
					}
				
			?>
		</div>
	</section>
<?php
	
	// Specialists Variables & Loop Prep
		$specialists_title = get_field('specialists_title');
		$specialists_sub_title = get_field('specialists_subtitle');
		$args = array(
			'post_type' => 'specialists',
			'order' => 'ASC',
			'posts_per_page' => -1,
			'orderby' => 'menu_order'
		);
		$query = new WP_Query( $args );
	
	// Begin Specialists Section
		echo "<section class='specialists'>
			  <header>
			  	<h2>$specialists_title</h2>
			  	<p>$specialists_sub_title</p>
			  </header>
			  <div class='specialists_grid_container'>
			  	<div class='specialists_wrapper'>";
	
	
	// Begin Loop - display specialist
		$specialist_id = 0; // start with 0 so that the ID will match array positions
		$quotes = array(); // intialize array to store quote information so that we don't need to loop for it again later
		
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
			echo "<div class='$specialist_class' data-self='$specialist_json' style='background-image: url($photo_full)'>
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
	
	
	// End .specialists_wrapper
		echo "</div>";
// Scroll Hint
// 		echo "<div class='scroll_hint'><span class='view_more'>swipe to view more</span></div>";

	// Build lightbox skeleton-frame for displaying specialist information upon a user's 'view-more' click 
		echo "<div class='specialist_expand_container'>
				<div class='specialist_expand_wrapper'>
				    <div class='specialist_expand_image'>
				    	<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' />
				    </div>
				    <div class='specialist_expand_content'>
				    	<div class='header dash-title'>
					    	<h3>Andrew Mastin</h3>
					        <p>Specialist & Founder</p>
					    </div>
					    <div class='content'>
					    	<p>Andrew was born and raised in South Eastern Pennsylvania. His first words, \u0022car keys\u0022 made his interests evident and a ride in a Ferrari 328 GTS at the age of five defined his future. Needless to say, AndrewÃ¢ÂÂs interest in cars was inevitable and extremely enthusiastic; which was the premise on which he and Adolfo founded LBI. Today he is an active, aggressive member of the team and collector car community.\r\n\r\nHe is constantly looking to grow, expand, educate himself (and others) all while enjoying the cars which he is so fortunate to be a part of every day. His areas of interest are certainly sports cars from the 1960Ã¢ÂÂs, but he also has a great appreciation and understanding for Pre-War European and American classics. On the off chance you find Andrew not at the office or on the road in pursuit of the next find, you might find him on the lawn at Pebble Beach or Amelia Island with his family, or out on some back roads behind the wheel.</p>
					    </div>
					    <span class='launch_video main-btn' data-frame=''>launch video</span>
				    </div>
				    <div class='close_expand'><span>click to close</span></div>
				</div>
			  </div>";
		
		
	// End .specialists_grid_container
		echo "</div>";	
		
	// Build a sectino to display the specialists' quotes
		echo "<div class='specialists_quotes_container owl-carousel sepcialist_carousel'>";
			
			foreach($quotes as $quote){
				
				// Variables 
				$quote_id = $quote['id'];
				$quote_content = $quote['quote'];
				$quote_signature = $quote['signature_file'];
				$quote_specialist = $quote['name'];
				$quote_position = $quote['position'];
				$quote_class = "specialist_quote_wrapper quote-$quote_id";
				
				echo "<div class='$quote_class'>
					  	<p class='quote'>$quote_content</p>
					  	<img src='$quote_signature' />
					  	<p class='specialist_tag'>$quote_specialist, $quote_position</p>
					  </div>";
			}
		
		echo "</div>"; // end .specialists_quotes_container
		
	// End section.specialists
		echo "</section>"; 
		
	// Invoke site footer
		get_footer();
?>