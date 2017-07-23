<?php
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
				$price = get_offering_price();
			
				
			// Markup for offering display
?>				
				<article class="<?php echo $offer_class; ?>">
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
					<?php
						
						if($featured_image){
							// Display Image background

								echo "<img src='$fimage_url' class='$media_class' />";
							
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