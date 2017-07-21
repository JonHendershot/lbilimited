<?php
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Offerings Single content, both current and past 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
		wp_reset_query();
	
	// Get and store page content
	
		// Galleries
		
			// 1. Initialize a photos array and set the first level with a 'glams' and 'regs' key 
			//    to later store the photo arrays in
				$photos = array();
				$photos['glams'] = array();
				$photos['regs'] = array();
			
			// 2. Call each gallery for the post by category -- each of these will return an array
				$exterior_glam      = get_field('exterior_glam');
				$interior_glam      = get_field('interior_glam');
				$engine_bay_glam    = get_field('engine_bay_glam');
				$trunk_area_glam    = get_field('trunk_area_glam');
				
				$exterior_reg      = get_field('exterior_reg');
				$interior_reg      = get_field('interior_reg');
				$engine_bay_reg    = get_field('engine_bay_reg');
				$trunk_area_reg    = get_field('trunk_area_reg');
				$underside_reg     = get_field('underside_reg');
			
			// 3. Push each array category into the photos['category'] array with a specific Key 
			//    to identify the array and later classify the photos.
			// 		This is similar to what we did in step 1, but a level deeper. 
			//		The key allows us to pass the photos to the interface under different 
			//		categories so they can be properly categorized, subcategorized, and filtered 

				$photos['glams']['Exterior'] = $exterior_glam;
				$photos['glams']['Interior'] = $interior_glam;
				$photos['glams']['Engine Bay'] = $engine_bay_glam;
				$photos['glams']['Trunk Area'] = $trunk_area_glam;
				
				$photos['regs']['Exterior'] = $exterior_reg;
				$photos['regs']['Interior'] = $interior_reg;
				$photos['regs']['Engine Bay'] = $engine_bay_reg;
				$photos['regs']['Trunk Area'] = $trunk_area_reg;
				$photos['regs']['Underside'] = $underside_reg;
		
		// Offering Overview 
			$startup_audio = get_field('startup_sound');
			$stat_repeater = 'offering_stats';
			$documents_repeater = 'offering_documents';	
			
		// Theme Options
			$options = get_option('lbilimited_options');
			$offering_form = $options['offering_form'];
			
		
		
				
		
	// Invoke site header
		get_header();
	
	// Check if the glam and regs categories have items
		$glams_have_photos = offering_has_photos( $photos['glams'] );
		$regs_have_photos  = offering_has_photos( $photos['regs'] );
	
	if($glams_have_photos || $regs_have_photos) :
	?>
	<section class="featured_image_sliders vhfix">
		<?php if( $glams_have_photos ) : ?>
		<div class="featured_image_showcase glam visible">
			<div class="featured_image_slider_container">
				<div class="featured_image_slider_wrapper">
					<?php
						
						// Variables
							// Because these pages can have 400+ photos in them, 
							// we'll create a loop number to be incremented each time 
							// a photo in the array is accessed so that we can 
							// lazyload images later than a certain threshold
							// to mitigate server load 
								$loop_number = 0;
								
							// a categories array will be used to dynamically create a filter 
							// based on which category of photos are present
								$categories = array(); 
								
						// Output the photo slider for the glams photos		
							foreach($photos['glams'] as $key=>$glam){
							 
							if( !empty($glam) ){
								// Add the $key to the categories array.
									$categories[] = $key;
									
								
								// Display content of this category
								foreach($glam as $id=>$photo){
								
									$med_url = $photo['sizes']['medium_large'];
									$full_url = $photo['url'];
									$blur_url = $photo['sizes']['blur'];
									$cat = strtolower( str_replace(" ", "_", $key) );
									$slug = "$cat-$id slide-$loop_number-glam";
									$img_alt = $photo['alt'];
									$tiny_gif = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
									
									
									// Create array of image information to be used for lightbox
										$image_info = array(
											'img_class' => 'glam',
											'full_url' => $full_url,
											'blur_url' => $blur_url,
											'photo_id' => $loop_number							
										);
										$image_data = array_map('utf8_encode', $image_info);
										$image_json = json_encode($image_data);
										
									// Only the first 6 images of the slider are visible, intially, 
									// so we'll only load the first 6 images at first and then
									// everything after 6 will be lazyloaded
										if($loop_number <= 6){
											$image = "<img src='$med_url' alt='$img_alt'/>";
										}else {
											$image = "<img src='$tiny_gif' data-src='$med_url' class='lazy-load'  alt='$img_alt'/>";
										}
										
										echo "<div class='featured_slide glam glam-$cat $slug' data-image='$image_json' data-id='$loop_number'>$image</div>";
									
									// Increment our $loop_number to update how many images have 
									// been loaded so far
										$loop_number++;
								}
							}
						}
	
					?>
				</div>
			</div>
			
			<div id="image_filters">
				<div class="featured_image_filter_wrapper">
					<i class="fa fa-filter"></i>
					<ul class="filter">
						<li class="cat-all">
							<span class="active" data-cat="all" data-class="glam">All</span>
						</li>
						<?php
						
							// Only show Filters IF there's more than one category of photos present
							if( count($categories) > 1) :
				

							foreach($categories as $category){
								
								$cat_id = strtolower( str_replace(" ", "_", $category) );
								
								echo "<li class='cat-$cat_id'>
										<span data-cat='glam-$cat_id' data-class='glam'>$category</span>
									  </li>";
							}	
							endif;
						?>
					</ul>
				</div>
				<div class="show_filter_trigger">
<!--
					<i class="fa fa-square-o"></i>
					<i class="fa fa-square-o"></i>
					<i class="fa fa-square-o"></i>
-->
					<span class="msg">show more</span>
					<i class="fa fa-chevron-up arrow"></i>
				</div>
				<?php if( $regs_have_photos ) : ?>
				<div class="gallery_trigger detailed_trigger" data-gallery="reg">View detailed photos</div>
				<?php endif; ?>
			</div>
			
		</div>
		<?php endif; // if glams have photos
			  if( $regs_have_photos ) :
		?>	
		<div class="featured_image_showcase reg">
			<div class="featured_image_slider_container">
				<div class="featured_image_slider_wrapper">
					<?php
						
						// Variables
									
							// We need to reset the $loop_number integer and $categories array because
							// we'll be using them again to output the regs photos for the post
								$loop_number = 0;
								$categories = array();
						
						// Output the photo slider for the regs photos
						
							foreach($photos['regs'] as $key=>$reg){
							 
								if( !empty($reg) ){
									// Add the $key to the categories array.
										$categories[] = $key;
										
									
									// Display content of this category
									foreach($reg as $id=>$photo){
									
										$med_url = $photo['sizes']['medium_large'];
										$full_url = $photo['url'];
										$blur_url = $photo['sizes']['blur'];
										$cat = strtolower( str_replace(" ", "_", $key) );
										$slug = "$cat-$id slide-$loop_number-reg";
										$img_alt = $photo['alt'];
										$tiny_gif = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
										
										
										// Create array of image information to be used for lightbox
											$image_info = array(
												'img_class' => 'reg',
												'full_url' => $full_url,
												'blur_url' => $blur_url,
												'photo_id' => $loop_number							
											);
											$image_data = array_map('utf8_encode', $image_info);
											$image_json = json_encode($image_data);
											
											
										// None of these are visible on the intial load, so they will all be lazy loaded
											$image = "<img src='$tiny_gif' data-src='$med_url' class='lazy-load'  alt='$img_alt' />";
										
											
											echo "<div class='featured_slide reg reg-$cat $slug' data-image='$image_json' data-id='$loop_number'>$image</div>";
										
										// Increment our $loop_number to update how many images have 
										// been loaded so far
											$loop_number++;
									}
								}
							}
	
					?>
				</div>
			</div>
			
			<div id="image_filters">
				
				<div class="featured_image_filter_wrapper">
					<i class="fa fa-filter"></i>
					<ul class="filter">
						<li class="cat-all">
							<span class="active" data-cat="all" data-class="reg">All</span>
						</li>
						<?php
							
							// Only show Filters IF there's more than one category of photos present
							if( count($categories) > 1) :
						
							foreach($categories as $category){
								
								$cat_id = strtolower( str_replace(" ", "_", $category) );
								
								echo "<li class='cat-$cat_id'>
										<span data-cat='reg-$cat_id' data-class='reg'>$category</span>
									  </li>";
							}	
							endif;
						?>
					</ul>
				</div>
	
				<div class="show_filter_trigger">
<!--
					<i class="fa fa-square-o"></i>
					<i class="fa fa-square-o"></i>
					<i class="fa fa-square-o"></i>
-->
					<span class="msg">See More</span>
					<i class="fa fa-chevron-up arrow"></i>
				</div>
				<?php if( $glams_have_photos ) : ?>
				<div class="gallery_trigger glam_trigger" data-gallery="glam">View glam photos</div>
				<?php endif; ?>
			</div>
			
		</div>
		<?php endif; // if regs have photos ?>
	</section>
	<?php endif; ?>

	<section id="offering_content">
		<?php echo vehicle_details(); ?>
<!--
		<div class="offering_overview">
			<h4 class="tilt_title upside_down">Overview Stats</h4>
			<div class="overview_wrapper">
				<?php
				
				// Build an Unordered List of Stats, if stats exist
					if( have_rows($stat_repeater) ) :
					
						echo "<ul class='overview_stats'>";
						
							while( have_rows($stat_repeater) ) : the_row();
								// Variables
									$stat = get_sub_field('offering_statistic');
								
								echo "<li class='stat'>$stat</li>";
						
							endwhile;
							
						echo "</ul>";
					
					endif;
				
					// Buttons for documents and startup sound
					echo "<div class='overview_buttons_wrapper'>";
					
						if( $startup_audio ){
							// variable
								$audio_url = $startup_audio['url'];
								$audio_type = $startup_audio['mime_type'];
							// Build startup audio button
							echo "<div class='audio_control_wrapper s_btn white btn'>
								 <div class='startup_trigger startup_trigger_wrapper' data-src='$audio_url'>
									<audio controls id='startup_audio'>
										<source src='$audio_url' type='$audio_type' />
									</audio>
									<span>hear startup</span>
								  </div>
									<div class='audio_controls'>
										<i class='fa fa-backward'></i>
										<i class='fa fa-play startup_trigger' aria-hidden='true'></i>
										<i class='fa fa-pause startup_trigger' aria-hidden='true'></i>
									</div>
								  </div>";
						}
						echo "<a href='#inquire' class='btn main-btn white waypoint anchor' data-cid='inquire' data-padding='100'>Inquire Below</a>";
						if( have_rows($documents_repeater) ){
							// Build documents trigger button
							echo "<div class='documents_trigger btn s_btn white'>view documents</div>";
						}
						
						
						
					echo "</div>"; // .overview_buttons_wrapper
					
					
					
				?>
			</div>
		</div>
-->
		<div class="offering_details_container">
			<div class="offering_details_wrapper">
				<h4 class="tilt_title">Details</h4>
				<div class="content_container">
					<div class="content_wrapper">
						<?php the_content(); ?>
						<?php get_template_part('template-parts/module','post_navigator'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		// Build an array for the form information and
		// Call the custom function from functions.php to build the contact form section
			$form_array = array();
			$form_array[] = array(
				'title' => 'offering_contact general_contact',
				'shortcode' => $offering_form,
			);
			
			lbi_contact($form_array, 'contact');
	
	

	  ///////////////////////////////////
	 // / /     ARRAY TESTING     / / //
	///////////////////////////////////
	
// 		echo "<pre>";
/*
		print_r( $exterior_glam );
		print_r( $interior_glam );
		print_r( $engine_bay_glam );
		print_r( $trunk_space_glam );
		print_r( $exterior_reg );
		print_r( $interior_reg );
		print_r( $engine_bay_reg );
		print_r( $trunk_space_reg );
		print_r( $underside_reg );
*/

/* 			print_r($photos); */


	
		// Example: loop through a photos['category']
/*
				$loop_number = 0;
				foreach($photos['glams'] as $key=>$glam){
					echo "<h3> $key </h3>";
					 
					foreach($glam as $id=>$photo){
						
						$url = $photo['sizes']['medium'];
						$cat = strtolower( str_replace(" ", "_", $key) );
						$slug = "$cat-$id";
						
						if($loop_number <= 6){
							$image = "<img src='$url' />";
						}else {
							$image = "<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$url' class='lazy-load' />";
						}
						
						
						echo "<h4> $slug </h4>";
						echo $image;
						
						$loop_number++;
					}
					
				}
*/			
/* 		echo "</pre>"; */


	// Invoke site footer
		get_footer();