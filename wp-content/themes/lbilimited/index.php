<?php

	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display only the archive for LBI News (posts) 
	// This is not a catchall template - The 'Default Template' page template will run through
	//		the page.php file. 
	// 		Individual posts will be run through the single-{category}.php file-structure.
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// First, Some Variables
		$blueprint_img_url = get_template_directory_uri() . '/inc/images/blueprint.png';

	// Invoke site header
		get_header();
	
	// Content Wrapper
		echo "<section id='archive-wrapper' class='archive-wrapper'>"; // style='background-image: url($blueprint_img_url)'
		
	// Post Loop Logic	
		if ( have_posts() ) :

		// Post Loop
			// while ( have_posts() ) : the_post();

			// 	get_template_part( 'template-parts/module', 'post_loop' );

			// endwhile;

			echo "<div class='loading_notification' id='post-loader'>Loading posts...</div>";

// 			get_template_part('template-parts/module', 'page_navigator');			
			
		else :

		// No posts exist, display the appropriate content
			get_template_part( 'template-parts/content', 'none' );

		endif;
		
	// Content Wrapper
		echo "</section>";
		
	// Invoke site footer
		get_footer();