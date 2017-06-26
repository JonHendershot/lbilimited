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
			$photo = get_field('a_spot_photo');
			$title = get_field('a_spot_title');
			$subtitle = get_field('a_spot_subtitle');
			$btn_text = get_field('a_spot_btn');
			$cat = get_field('a_spot_category');
		
		// First, we'll use the post selection to establish the proper page link
			if($cat == 'current-offerings' || $cat == 'past-offerings'){
				$link = home_url() . "/$cat";
			}else if($cat == 'collection'){
				$link = home_url() . "/lbi-collection";
			}else{
				$link = home_url() . "/" . get_permalink( get_option('page_for_posts') );
			}
		
		// Now we'll use the post selection to establish the proper query 
			if($cat == 'current-offerings' || $cat == 'past-offerings'){
				$post_type = 'offerings';
			}else {
				$post_type = $cat;
			}
			$args = array(
				'post_type' => $post_type,
				'posts_per_page' => 3,
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);
			$query = new WP_Query( $args );
			$post_display = '';
			$full_imgs = array();
			$ii = 0;
			
			while( $query->have_posts() ) : $query->the_post();
			
				if($post_type == 'offerings'){
						// Variables
							$post_title = offering_title();
							$post_link = get_the_permalink();
							
							if( get_field('featured_image') ){
								$image = get_field('featured_image');
								$image_url = $image['sizes']['medium_large'];
								$full_img = $image['url'];
							}else {
								$image_url = get_the_post_thumbnail_url('medium_large');
								$full_img = get_the_post_thumbnail_url('full');
							}
					
				}else {
					// Variables
						$post_title = get_the_title();
						$post_link = get_the_permalink();
						
						if( get_field('featured_image') ){
							$image = get_field('featured_image');
							$image_url = $image['sizes']['medium_large'];
							$full_img = $image['url'];
						}else {
							$image_url = get_the_post_thumbnail_url('medium_large');
							$full_img = get_the_post_thumbnail_url('full');
						}		
				}
				
				
			
				// We're storing the content in a variable here so we can build it later without needing to print out
				// a bunch of the markup surrounding it here.
				$full_imgs[] = array(
					'img' => $full_img,
					'title' => $post_title
				);
				$post_info = array(
					'post_id' => $ii
				);
				$post_data = array_map('utf8_encode', $post_info);
				$post_json = json_encode($post_data);
				
				$post_display .= "<a href='$post_link' class='featured_post' data-self='$post_json'>
									<img class='object-fit' src='$image_url' />
								  </a>";
			$ii++;		
			endwhile;
			wp_reset_query();
		
		// Build call to action section
					
?>
		<section class="home_cta_container">
			<div class="home_cta_wrapper">
				<div class="home_cta_image">
					<img src="<?php echo $photo['url']; ?>" />	
					<?php foreach($full_imgs as $index=>$img){
						
						$src = $img['img'];
						$post_title = $img['title'];
						
						echo "<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$src' class='lazy-load post-$index feat_full' />
							  <h2 class='post-$index'>$post_title</h2>";
					} ?>
				</div>
				<div class="home_cta_content">
					<h3><?php echo $title; ?></h3>
					<p><?php echo $subtitle; ?></p>
					
					<div class="featured_posts">
						<?php echo $post_display; ?>
					</div>
					<?php echo "<a class='main-btn' href='$link'>$btn_text</a>"; ?>
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
	?>
	<a href="<?php echo $social_link ?>" target="_blank" class="social_cta waypoint" data-padding="250">
		<h3><?php echo $social_header; ?></h3>	
		<p><?php echo $social_sub; ?></p>
		<span class="background_overlay" style="opacity: <?php echo $social_bg_opacity; ?>"></span>
		<?php echo $background; ?>
	</a>
	<?php
		
	// Invoke site footer
		get_footer();