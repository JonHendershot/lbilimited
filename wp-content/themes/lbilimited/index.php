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
		echo "<section id='archive-wrapper' class='archive-wrapper' style='background-image: url($blueprint_img_url)'>";
		
	// Post Loop Logic	
		if ( have_posts() ) :

		// Post Loop
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

		// Posts Navigation
			
			// A function in functions.php that returns an array containing the total number of pages [0] and the markup for the navigation numbers [1]
			$page_numbers = get_page_numbers();
		
			// If we're on the first or last page, we need to disable the appropriate navigation button, so we'll check that logic here and change the variable accordingly
			if( get_next_posts_link() ){
				$next_posts = get_next_posts_link('Next Page');	

			}else {
				$next_posts = '<a class="posts-nav-link disabled" disabled>Next Page</a>';
			}
			if( get_previous_posts_link() ){
				$prev_posts = get_previous_posts_link('Previous Page'); 
			}else {
				$prev_posts =  '<a class="posts-nav-link disabled" disabled>Previous Page</a>';
			}
				
			// Only export page navigations if we have more than one page				
			if( $page_numbers[0] > 1 ) :
			
				echo "<div class='posts-navigation'>
				  		$prev_posts
				  		$page_numbers[1]
				  		$next_posts
				  </div>";
			endif;
			
			
		else :

		// No posts exist, display the appropriate content
			get_template_part( 'template-parts/content', 'none' );

		endif;
		
	// Content Wrapper
		echo "</section>";
		
	// Invoke site footer
		get_footer();