<?php
	
	// Template Name: Home Page
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Home Page 
	// 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Invoke site header
		get_header();
		
	// Call to action
		// Variables
			$offering_title = get_field('offerings_title');
			$offering_subtitle = get_field('offerings_subtitle');
			$offering_btn = get_field('offerings_btn');
			$offering_link = get_field('offerings_link');
			
			$cs_title = get_field('coming_soon_title');
			$cs_subtitle = get_field('coming_soon_subtitle');
			$cs_btn = get_field('coming_soon_btn');
			$cs_link = get_field('coming_soon_link');
			
		
		// We're going to use cateogry IDs to check if there are any cars in the "coming soon" category
			$post_threshold = 1; // at least this many posts
			$cs_id = 269; // coming soon id
			$tax = 'offering_type';
			
			// Check if there are posts in the provided args
			$has_posts = tax_has_posts($cs_id, $tax, $post_threshold);
			
			// If there are, use that tax query, if not - revert to current offerings
			if($has_posts){
				// set Taxonomy ID
				$tax_id = $cs_id; // coming soon id
				
				// Establish proper Display Content
				$title = $cs_title;
				$subtitle = $cs_subtitle;
				$link = $cs_link;
				$btn_text = $cs_btn;
				
				// Since we'll be displaying a preview of posts that don't actually exist yet, we'll need to adjust
				// the call to action dynamically. 
				// This one will open a lightbox with a contact form
				$call_to_action = "<div class='main-btn inquiry_trigger' id='inquiry_trigger' data-title=''>$btn_text</div>";
			}else {
				$tax_id = 264; // current offerings id
				
				// Establish proper Display Content
				$title = $offering_title;
				$subtitle = $offering_subtitle;
				$link = $offering_link;
				$btn_text = $offering_btn;
				
				// Since we'll be displaying a preview of posts that don't actually exist yet, we'll need to adjust
				// the call to action dynamically. 
				// This one will lead to the current offerings page				
				$call_to_action = "<a class='main-btn' href='$link'>$btn_text</a>";
			}

			$args = array(
				'post_type' => 'offerings',
				'posts_per_page' => 3,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'offering_type',
						'terms' => $tax_id	
					)
				)
			);
			$query = new WP_Query( $args );
			$post_display = '';
			$full_imgs = array();
			$ii = 0;
			
			while( $query->have_posts() ) : $query->the_post();
			
	
				// Variables
					$post_title = offering_title();
					$clean_title = clean_offering_title();
					$post_link = get_the_permalink();
					$framing = 'center';
					
					if( get_field('3d_image') ){
						// If this post has an image specified for the 3d slider element on the home page, use it.
						$image = get_field('3d_image');
						$image_url = $image['sizes']['medium_large'];
						$full_img = $image['url'];
						$framing = get_field('3d_framing');
						
					}else
					if( get_field('featured_image') ){
						// If not, use the specified featured image
						$image = get_field('featured_image');
						$image_url = $image['sizes']['medium_large'];
						$full_img = $image['url'];
					}else {
						// If that's not set, we'll check if there's an image set with wordpress' default field
						$image_url = get_the_post_thumbnail_url('medium_large');
						$full_img = get_the_post_thumbnail_url('full');
					}
					
				
				
				
			
				// We're storing the content in a variable here so we can build it later without needing to print out
				// a bunch of the markup surrounding it here.
				$full_imgs[] = array(
					'img' => $full_img,
					'title' => $post_title,
					'framing' => $framing
				);
				$post_info = array(
					'post_id' => $ii,
					'post_title' => $clean_title
				);
				$post_data = array_map('utf8_encode', $post_info);
				$post_json = json_encode($post_data);
				
				if( $ii < 1){
					$car_visiblity = 'visible';
				}else {
					$car_visiblity = '';
				}
				
				// If we're in the coming soon category, we can't display the titles as links. We'll control that logic here
				if( has_term($cs_id, 'offering_type') ){
					$post_display .= "<div class='featured_post post-title-$ii $car_visiblity' data-self='$post_json'>$post_title</div>";
				}else {
					$post_display .= "<a href='$post_link' class='featured_post post-title-$ii $car_visiblity' data-self='$post_json'>$post_title</a>";
				}
				
			$ii++;		
			endwhile;
			wp_reset_query();
		
		// Build call to action section
					
?>
		<section class="home_cta_container">
			<div class="home_cta_wrapper">
				<div class="home_cta_image">	
					<?php foreach($full_imgs as $index=>$img){
						
						$src = $img['img'];
						$post_title = $img['title'];
						$photo_frame = $img['framing'];
						$display_class = "$photo_frame ";
						if( $index == 0 ){
							$display_class .= 'feat-visible';
						}
						
						echo "<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$src' class='lazy-load post-$index feat_full $display_class' data-slide='$index' />";
					} ?>
				</div>
				<div class="home_cta_content">
					<h3><?php echo $title; ?></h3>
					<p><?php echo $subtitle; ?></p>
					
					<div class="featured_posts">
						<?php echo $post_display; ?>
					</div>
					<div class="feat_post_nav">
						<?php 
							foreach($full_imgs as $index=>$image){
								
								if( $index < 1){
									$active = 'active';
								}else {
									$active = '';
								}
								
								echo "<div class='feat_bubble bubble-$index $active' data-index='$index'></div>";
							}
						?>
					</div>
					<?php echo $call_to_action; ?>
				</div>
				<span class="slant"></span>
				<span class="corners"></span>
			</div>
		</section>
<?php
		
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
		
	// Build Social Media Call To Action
		$social_header_input = get_field('main_text');
		$social_header = span_per_letter($social_header_input);
		$social_sub = get_field('sub_text');
		$social_bgmedia = get_field('background_media');
		$social_bg_opacity_raw = get_field('overlay_opacity');
		$social_bg_opacity = $social_bg_opacity_raw / 100;
		$social_link = get_field('clickthrough_link');
		$background = get_media($social_bgmedia,false);
		$background_image_file = get_field('scta_background_image');
		$background_image_url = $background_image_file['sizes']['large'];
		$background_image_alt = $background_image_file['alt'];
	?>
	<a href="<?php echo $social_link ?>" target="_blank" class="social_cta waypoint" data-padding="250">
		<h3><?php echo $social_header; ?></h3>	
		<p><?php echo $social_sub; ?></p>
		<span class="background_overlay" style="opacity: <?php echo $social_bg_opacity; ?>"></span>
		<?php echo $background; 
			if($background_image_file){
				echo "<img src='$background_image_url' alt='$background_image_alt' />";
			}
		?>
		<
	</a>
	<?php
		
	// Invoke site footer
		get_footer();