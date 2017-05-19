<?php
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This module will loop through the LBI offerings posts and display the appropriate content, 
	// based on which category we're calling from the page
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	
	// Let's declare a price variable and figure out which category we're in first
		$price;
		$category_list = array(
			'past' => 4,
			'current' => 3
		);
		$category = get_field('display_content');
		$category_id = $category_list[$category];
	
	// If we're in the Past Offerings category - our price variable should be locked to 'sold' for each item, otherwise, we'll set it in the loop
		if($category == 'past'){
			$price = 'Sold';
		}
	
	// Now let's set up our loop
		$args = array(
			'cat' => $category_id,
			'post_type' => 'offerings',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
		$query = new WP_Query( $args );
		
	// Begin Loop
		while( $query->have_posts() ) : $query->the_post(); 
			
			// Set item specific variables
				$excerpt = get_the_excerpt();
				$title = get_the_title();
				$offer_class = "offering";
				$media_class = "offering-fmedia";
				
				// grab the featured file information to dynamically generate display markup
				$file_framing = get_field('framing');
				$featured_file = get_field('featured_media');
				$featured_type = $featured_file['mime_type']; 
				$file_exp = explode("/",$featured_type);
				$file_type = $file_exp[0];
				$file_url = $featured_file['url'];
				
				// Update Offering class
				$offer_class .= " $file_type frame-$file_framing";
				$media_class .= " offering-bg-$file_type $file_framing";
				
			// If we're in the Current Offering category, set the price here
				if($category == 'current'){
					$price_value = get_field('price');
					$price = 'Offered at: $' . number_format($price_value,0,".",",");
				}
				
			// Markup for offering display
?>
				<article class="<?php echo $offer_class; ?>">
					<div class="offering-data dash-title">
						<div class="offering-meta">
							<h2><?php echo $title; ?></h2>
							<p><?php echo $excerpt; ?></p>
						</div>
						<div class="offering-price">
							<span class="price"><?php echo $price; ?></span>
							<a href="<?php the_permalink(); ?>">Learn More +</a>
						</div>
					</div>
					
					<?php
						
						if($file_type == 'image'){
							// Display Image background
							echo "<img src='$file_url' class='$media_class' />";
						}
						else if($file_type == 'video'){
							// Display Video Background
						?>
							<video class="<?php echo $media_class; ?>" controls>
								<source src="<?php echo $file_url; ?>" type="<?php echo $featured_type; ?>" />
							</video>
						<?php
						} // end video if
					?>
				</article>	
		
<?php
	
	// End Loop
		endwhile;
		wp_reset_query();