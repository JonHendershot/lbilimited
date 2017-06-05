<?php

	// Variables
		$post_type = get_post_type();
	
?>
<div class="search_bar_container">
	<?php if(is_page_template('templates/offerings.php')) : ?>
		<form role="search" action="<?php echo site_url('/'); ?>" method="get">
	
			<input type="search" name="s" placeholder="Looking for something specific?" autocomplete="off"/>
	
			<input type="hidden" name="post_type" value="offerings" /> <!-- // hidden 'your_custom_post_type' value -->
	
			<span class="submit">
				<input type="submit" alt="Search" value="" />
			</span>
	
		</form>
	<?php endif; 
		
		if(is_page_template('archive-lbi_media.php')) : ?>
		
		
		<form class="media_filter_container">
			<div>
			<p>Filter media by:</p>
			
		
		<?php
		
		$taxonomy = 'make';
		$tax_terms = get_terms($taxonomy);
		
		echo "<select class='media_filter'>
				<option value='make'>All Makes</option>";
			foreach($tax_terms as $term){
				$term_name = $term->name;
				echo "<option value='$term_name'>$term_name</option>";
			}
		echo "</select>";
	?>
			</div>
			<span class="submit">
				<input type="submit" alt="Search" value="" />
			</span>
		</form>
	
	<?php endif; ?>
	<div class="form_image">
		<img src="<?php echo get_template_directory_uri() . '/inc/images/search_bar.jpg'; ?>" />
	</div>
</div>