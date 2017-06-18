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
			
			while( $query->have_posts() ) : $query->the_post();
			
				if($post_type == 'offerings'){
						// Variables
							$_posttitle = get_the_title();
							$post_link = get_the_permalink();
							
							if( get_field('featured_image') ){
								$image = get_field('featured_image');
								$image_url = $image['sizes']['medium'];
							}else {
								$image_url = get_the_post_thumbnail_url('medium');
							}
					
				}else {
					// Variables
						$post_title = get_the_title();
						$post_link = get_the_permalink();
						
						if( get_field('featured_image') ){
							$image = get_field('featured_image');
							$image_url = $image['sizes']['medium'];
						}else {
							$image_url = get_the_post_thumbnail_url('medium');
						}		
				}
			
				// We're storing the content in a variable here so we can build it later without needing to print out
				// a bunch of the markup surrounding it here.
				$post_display .= "<a href='$post_link' class='featured_post'>
									<img class='object-fit' src='$image_url' />
								  </a>";
					
			endwhile;
			wp_reset_query();
		
		// Build call to action section
					
?>
		<section class="home_cta_container">
			<div class="home_cta_wrapper">
				<div class="home_cta_image">
					<img src="<?php echo $photo['url']; ?>" />	
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
	
	?>
	<section class="social_cta">
		<h3>#claimyourclassic</h3>	
		<p>your dream car is only a click away</p>
	</section>
	<?php
		
	// Invoke site footer
		get_footer();