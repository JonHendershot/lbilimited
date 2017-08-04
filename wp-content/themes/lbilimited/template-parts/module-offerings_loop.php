<?php
	// Set item specific variables
				$excerpt = get_the_excerpt();
				$title = offering_title();
				$offer_class = "offering";
				$media_class = "offering-fmedia";
				$post_id = get_the_ID();
				$sold_overly = get_field('sold_overlay');
				
				
				// grab the featured file information to dynamically generate display markup
				$file_framing = get_field('framing');
				$featured_image = get_field('featured_image');
				$fimage_url = $featured_image['url'];
				$featured_video = get_field('featured_media');
				
				$blur_img = $featured_image['sizes']['blur'];
				
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
				$price = get_offering_price();
			
				
			// Markup for offering display
?>				
				<article class="<?php echo $offer_class; ?>">
					<?php if($sold_overly == 'on') : ?>
						<div class="sold_overlay">sold</div>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>" id="<?php echo "post-$post_id"; ?>">
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
					<div class="media_wrapper">
						<div class="placeholder">
							<img class="waypoint" data-padding="100" src="<?php echo get_template_directory_uri() . '/inc/images/icon_placeholder.png'; ?>" />
						</div>
						
					<?php
						
						if($featured_image){
							
							// Blur placeholder
/*
							echo "<div class='blur_img'>
									<img data-src='$blur_img' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' class='lazy-load' class='$media_class'>
								  </div>";
*/
								  
							// Display Image background
								echo "<img data-src='$fimage_url' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' class='$media_class lazy-load' />";
							
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
					</div>
				</a>
				</article>	