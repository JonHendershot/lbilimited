<?php
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This module will loop through the LBI offerings posts and display the appropriate content, 
	// based on which category we're calling from the page
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	
	// Let's declare a price variable and figure out which category we're in first
		$price = '';
		$category_list = array(
			'past' => 265,
			'current' => 264
		);
		$category = get_field('display_content');
		$category_id = $category_list[$category];
		$post_count = 1;
	
	// If we're in the Past Offerings category - our price variable should be locked to 'sold' for each item, otherwise, we'll set it in the loop
		if($category == 'past'){
			$price = 'Sold';
		}
	
	// Now let's set up our loop
		$args = array(
			'post_type' => 'offerings',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'offering_type',
					'terms' => $category_id	
				)
			)
		);
		$query = new WP_Query( $args );
		
	// Begin Loop
		while( $query->have_posts() ) : $query->the_post(); 
			
			// Set item specific variables
				$excerpt = get_the_excerpt();
				$title = offering_title();
				$offer_class = "offering";
				$media_class = "offering-fmedia";
				$post_id = get_the_ID();
				
				
				// grab the featured file information to dynamically generate display markup
				$file_framing = get_field('framing');
				$featured_image = get_field('featured_image');
				$fimage_url = $featured_image['url'];
				$featured_video = get_field('featured_media');
				
				$file_url = $featured_video['url'];
				
				// Set a file type based on whether or not a video is loaded for this offering
				// if it is, we'll append 'video' the class so we can control the objects behavior 
				if($featured_video){
					$featured_type = $featured_video['mime_type']; 	
				}else {
					$featured_type = $featured_image['mime_type']; 
				}
				$file_exp = explode("/",$featured_type);
				$file_type = $file_exp[0];
				
				// Update Offering class
				$offer_class .= " $file_type frame-$file_framing";
				$media_class .= " offering-bg-$file_type $file_framing";
				
			// If we're in the Current Offering category, set the price here
				if($category == 'current'){
					$price = get_offering_price();
				}
				
			// Markup for offering display
?>				<a href="<?php the_permalink(); ?>" id="<?php echo "post-$post_id"; ?>">
				<article class="<?php echo $offer_class; ?>">
					<div class="offering-data dash-title">
						<div class="offering-meta">
							<h2><?php echo $title; ?></h2>
							<p><?php echo $excerpt; ?></p>
						</div>
						<div class="offering-price">
							<span class="price"><?php echo $price; ?></span>
							<span class="learn-more">Learn More +</span>
						</div>
					</div>
					
					<?php
						
						if($featured_image){
							// Display Image background
							if($post_count > 5){
								echo "<img data-src='$fimage_url' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' class='$media_class lazy-load' />";
							}else {
								echo "<img src='$fimage_url' class='$media_class' />";
							}
							
						}
						
						if($featured_video){
							// Display Video Background
						?>
							<video class="<?php echo $media_class; ?>" controls>
								<source src="<?php echo $file_url; ?>" type="<?php echo $featured_type; ?>" />
							</video>
						<?php
						} // end video if
					?>
				</article>	
				</a>
		
<?php
	
	// End Loop
		$post_count++;
		endwhile;
		wp_reset_query();