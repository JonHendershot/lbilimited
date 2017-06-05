<?php 
	// Let's grab the variables for the page first
		// Get Global Site Options
			$options = get_option('lbilimited_options');

		// Page Options
			$contact_heading = get_field('information_heading');
			$contact_subheading = get_field('information_subheading');
			$availability = get_field('availability');
			$phone_numbers = get_field('phone');
			$email = get_field('email');
			$social_background = get_field('social_photo');
		
		// Social Links
			$facebook_link = $options['LBI_facebook'];
			$twitter_link = $options['LBI_twitter'];
			$instagram_link = $options['LBI_instagram'];
			$youtube_link = $options['LBI_youtube'];
			
		// Contact Form
			$general_form = get_field('general_contact');
?>

	<section class="contact_information">
		<div class="map_img">
			<img src="<?php echo get_template_directory_uri() . '/inc/images/map_2.jpg'; ?>" />
		</div>
		<div class="information_wrapper">
			<div class="header">
				<?php
					echo "<h2>$contact_heading</h2>
						  <p>$contact_subheading</p>";	
				?>
			</div>
			<div class="information">
				<div class="availability">
					<h3>Availability:</h3>
					<p><?php echo $availability; ?></p>
				</div>
				<div class="phone">
					<h3>Phone:</h3>
					<p><?php echo $phone_numbers; ?></p>
				</div>
				<div class="email">
					<h3>Email:</h3>
					<p><?php echo $email; ?></p>
				</div>
			</div>
		</div>
	</section>
	<section class="social_links">
		<h4 class="tilt_title">We're Social</h4>
		<div class="tilt_container">
			<img src="<?php echo $social_background['url']; ?>" />
		</div>
		<div class="tilt_wrapper">
			
			<div class="tilt_content">
				<div class="social_follow_container facebook">
					<a target="_blank" href="<?php echo $facebook_link; ?>" class="social_logo facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>
					<a target="_blank" href="<?php echo $facebook_link; ?>" class="social_follow_btn">Like</a>
				</div>
				<div class="social_follow_container instagram">
					<a target="_blank" href="<?php echo $instagram_link; ?>" class="social_logo instagram">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
					<a target="_blank" href="<?php echo $instagram_link; ?>" class="social_follow_btn">Follow</a>
				</div>
				<div class="social_follow_container youtube">
					<a target="_blank" href="<?php echo $youtube_link; ?>" class="social_logo youtube">
						<i class="fa fa-youtube" aria-hidden="true"></i>
					</a>
					<a target="_blank" href="<?php echo $youtube_link; ?>" class="social_follow_btn">Subscribe</a>
				</div>
				<div class="social_follow_container twitter">
					<a target="_blank" href="<?php echo $twitter_link; ?>" class="social_logo twitter">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>
					<a target="_blank" href="<?php echo $twitter_link; ?>" class="social_follow_btn">Follow</a>
				</div>
			</div>
		</div>
	</section>
	<?php
		// Build an array for the form information and
		// Call the custom function from functions.php to build the contact form section
			$form_array = array();
			$form_array[] = array(
				'title' => 'general_contact',
				'shortcode' => $general_form
			);
			
			lbi_contact($form_array, 'contact');
