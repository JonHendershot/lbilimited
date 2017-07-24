<?php
	
	// Template Name: About
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the About LBI content
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Page Variables
		$hero_quote        = get_field('value_hero_quote');
		$hero_img          = get_field('value_hero_image');
	
	// Invoke site header
		get_header();
	
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
		
	// Hero Quote
?>
	<section class="lbi_values">
		<header class="values_hero" style="background-image: url(<?php echo $hero_img['url']; ?>)">
			<h2><?php echo $hero_quote; ?></h2>
		</header>
		<div class="value_wrapper">
			<?php
			
				// Loop to display values
					for($vv = 1; $vv <= 6; $vv++){
						// Setup Variables
							$value_title_str = "value_title_$vv";
							$value_content_str = "value_body_$vv";
							$value_title = get_field($value_title_str);
							$value_content = get_field($value_content_str);
							$value_class = 'value';
							
							if($vv == 1){
								$value_class .= ' active';
							}
						// Output Content
							if($value_title && $value_content){
								echo "<article class='$value_class'>
										<div class='value_content'>
										  	<h3>$value_title</h3>
										  	<p>$value_content</p>
										</div>
									  </article>";
							}
					}
				
			?>
		</div>
	</section>
<?php
	
	// Specialists Variables & Loop Prep
		$specialists_title = get_field('specialists_title');
		$specialists_sub_title = get_field('specialists_subtitle');
		$specialists_header_bg = get_field('specialist_background_photo');
		$specialists_bg_url = $specialists_header_bg['sizes']['large'];
		$specialists_bg_alt = $specialists_header_bg['alt'];
		$specialists_bg_video = get_field('specialists_background_video');
		$specialists_bg_video_url = $specialists_bg_video['url'];
		$video_type = $specialists_bg_video['mime_type'];
		$args = array(
			'post_type' => 'specialists',
			'order' => 'ASC',
			'posts_per_page' => -1,
			'orderby' => 'menu_order'
		);
		$query = new WP_Query( $args );
		
		$specialists_title = span_per_letter($specialists_title);
	
	// Begin Specialists Section
		echo "<section class='specialists'>
			  <header class='waypoint' data-padding='200'>
			  	<h2>$specialists_title</h2>
			  	<p>$specialists_sub_title</p>
			  	<img src='$specialists_bg_url' alt='$specialists_bg_alt' />";
			  	
			  	if($specialists_bg_video){
				  	echo "<video autoplay loop muted>
				  			<source src='$specialists_bg_video_url' type='$video_type' />
				  		  </video>";
			  	}
			  	
		echo "</header>
			  <div class='specialists_grid_container'>";
			  
// CHANGE CONTENT WITH GRIDLOCK
				get_template_part('template-parts/module', 'gridlock_specialists');
			  
// Scroll Hint
// 		echo "<div class='scroll_hint'><span class='view_more'>swipe to view more</span></div>";

	// Build lightbox skeleton-frame for displaying specialist information upon a user's 'view-more' click 
		?> <div class='specialist_expand_container'>
				<div class='specialist_expand_wrapper'>
				    <div class='specialist_expand_content'>
					    
					    <div class='specialist_expand_image'>
					    	<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' />
					    </div>
						<div class="specialist_content">
							<div class="header-content">
								<div class='header dash-title'>
							    	<h3></h3>
							        <p></p>
							    </div>
							    <div class="btns">
									<span class='launch_video main-btn hidden' data-frame=''>launch video</span>
							    </div>
							</div>
						    <div class='content'>
						    	<p></p>
						    </div>
						     <div class='close_expand s_btn white'><span>go back</span></div>
						</div>
						
				    </div>
				    
				</div>
			  </div>
		
	<?php
	// End .specialists_grid_container
		echo "</div>";	
		
	// Build a sectino to display the specialists' quotes
		echo "<div class='specialists_quotes_container owl-carousel sepcialist_carousel'>";
			
			foreach($quotes as $quote){
				
				// Variables 
				$quote_id = $quote['id'];
				$quote_content = $quote['quote'];
				$quote_signature = $quote['signature_file'];
				$quote_specialist = $quote['name'];
				$quote_position = $quote['position'];
				$quote_class = "specialist_quote_wrapper quote-$quote_id";
				
				echo "<div class='$quote_class'>
					  	<p class='quote'>$quote_content</p>
					  	<img src='$quote_signature' />
					  	<p class='specialist_tag'>$quote_specialist, $quote_position</p>
					  </div>";
			}
		
		echo "</div>"; // end .specialists_quotes_container
		
	// End section.specialists
		echo "</section>"; 
		
	// Invoke site footer
		get_footer();
?>