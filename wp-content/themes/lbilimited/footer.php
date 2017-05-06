<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */

// Call global options data and establish variables for the template -- this pulls information from the theme options found in the appearance menu, as established in theme_options.php
	$options = get_option('lbilimited_options');

	// CTA Variables
		$CTA_title = $options['LBI_f_CTA'];
		$CTA_sub = $options['LBI_f_CTA_sub'];
		$CTA_mailer = $options['LBI_f_mailer_shortcode'];
		$CTA_bg_image = $options['footer_background'];
	
	// Meta variables
		$copyright = $options['LBI_f_copyright'];
		$email = $options['LBI_f_email'];
	
	// Social Links
		$facebook_link = $options['LBI_facebook'];
		$twitter_link = $options['LBI_twitter'];
		$instagram_link = $options['LBI_instagram'];
		$youtube_link = $options['LBI_youtube'];

// Get conditional logic variable from each page to decide whether or not we should display the featured item module 
	$featured_toggle = get_field('featured_toggle');
	
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php 
			// Show the featured content if it's enabled for this page
			if($featured_toggle == 'Yes'){
				get_template_part('template-parts/module', 'footer_feature');
			} 
		?>
		<div class="newsletter-cta" style="background-image: url(<?php echo $CTA_bg_image; ?>);">
			<?php
				echo "<h3>$CTA_title</h3>
				<p>$CTA_sub</p>" .
				do_shortcode($CTA_mailer);
			?>
		</div>
		<div class="footer-meta">
			<div class="container">
				<div class="copyright"><?php echo $copyright; ?></div>
				<div class="email"><?php echo "<a href='mailto:$email'>$email</a>"; ?></div>
				<div class="socials">
					<?php
					// only apply sections for the social links if they're saved in the options page
					
					if($facebook_link){
						echo "<a href='$facebook_link' class='social-link facebook'><i class='fa fa-facebook' aria-hidden='true'></i></a>";
					}
					if($instagram_link){
						echo "<a href='$instagram_link' class='social-link instagram'><i class='fa fa-instagram' aria-hidden='true'></i></a>";
					}
					if($youtube_link){
						echo "<a href='$youtube_link' class='social-link youtube'><i class='fa fa-youtube' aria-hidden='true'></i></a>";
					}
					if($twitter_link){
						echo "<a href='$twitter_link' class='social-link twitter'><i class='fa fa-twitter' aria-hidden='true'></i></a>";
					}	
						
					
					
					?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
