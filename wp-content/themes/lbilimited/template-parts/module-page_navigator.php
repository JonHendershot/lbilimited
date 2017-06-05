<?php
	// Posts Navigation
			
			// A function in functions.php that returns an array containing the total number of pages [0] and the markup for the navigation numbers [1]
			$args = array(
				'prev_next'          => false,
			);
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

