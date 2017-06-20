<?php
					// Posts Navigation
		
						// Setup the archive post link to take users back to the archive page
							$post_type = get_post_type();
							if($post_type == 'offerings'){
								if(has_term('current-offerings','offering_type')){
									$slug = 'current-offerings';
								}else 
								if( has_term('past-offerings','offering_type')){
									$slug = 'past-offerings';
								}
								
							}else 
							if($post_type == 'collection'){
								$slug = 'lbi-collection';
							}else {							
								$post_page = get_archive_page_num( $post->ID );
								$slug = "in-the-news/page/$post_page/";
							}
							
							$archive_link = home_url() . "/$slug";
							$anchor = get_the_ID();
					
						// If we're on the first or last page, we need to disable the 
						// appropriate navigation button, so we'll check that logic here
						// and change the variable accordingly
							$next_post = get_next_post();	
							$prev_post = get_previous_post();
								
							// Only export page navigations if we have more than one page					
							echo "<div class='posts-navigation'>";
							  		if($prev_post){
								  		// Variables 
								  			$prev_url = get_permalink($prev_post->ID);
								  			$prev_title = get_the_title($prev_post->ID);
								  		// Output
								  			echo "<a href='$prev_url' class='posts-nav-link'>$prev_title</a>";
							  		}else {
								  		echo '<a class="posts-nav-link disabled" disabled>Previous Post</a>';
							  		}
							  		
							  		echo "<a href='$archive_link#post-$anchor' class='btn'>Back to Archive</a>";
							  		
							  		if($next_post){
								  		// Variables 
								  			$next_url = get_permalink($next_post->ID);
								  			$next_title = get_the_title($next_post->ID);
								  		// Output
								  			echo "<a href='$next_url' class='posts-nav-link'>$next_title</a>";
							  		}else {
								  		echo '<a class="posts-nav-link disabled" disabled>Next Post</a>';
							  		}
							  		
							echo "</div>"; // .posts-navigation
						
