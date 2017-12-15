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
	
	// Now let's set up our loop
		// $args = array(
		// 	'post_type' => 'offerings',
		// 	'orderby' => 'menu_order',
		// 	'order' => 'ASC',
		// 	'tax_query' => array(
		// 		array(
		// 			'taxonomy' => 'offering_type',
		// 			'terms' => $category_id	
		// 		)
		// 	)
		// );
		// $query = new WP_Query( $args );
		
	// Begin Loop
	// 	while( $query->have_posts() ) : $query->the_post(); 
		
	// 		get_template_part('template-parts/module', 'offerings_loop');
	
	// // End Loop

	// 	endwhile;
	// 	wp_reset_query();
?>
	<div class="loading_notification hidden" id="post-loader">
		<div class="loading_info">
			<?php get_template_part('template-parts/module', 'loader'); ?>
			<p>Loading more posts</p>
		</div>
		<div class="image_container">
			<?php the_post_thumbnail('blur'); ?>
		</div>
	</div>
<?php
		wp_reset_query();