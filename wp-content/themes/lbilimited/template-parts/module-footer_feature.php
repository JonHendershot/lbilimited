<div class="featured-posts">
	<?php $features = get_field('feature_display'); 
		  $options = get_option('lbilimited_options');
		
/*
		echo "<pre>";
			print_r($features);
		echo "</pre>";
*/
		
		foreach($features as $key=>$feature){
			$title = $feature['label'];
			$slug = $feature['value'];
			$photo_slug = $slug . '-photo';
			$overlay_slug = $slug . '-overlay';
			$overlay_toggle = $options[$overlay_slug];
			$photo = $options[$photo_slug];
			$photo_id = get_image_id($photo);
			$photo_url = wp_get_attachment_image_url($photo_id, 'large');
			if($key <= 1){
				
		?>
		
		<a href="<?php echo home_url() . '/' . $slug; ?>" class="feature" style="background-image:url(<?php echo $photo_url; ?>);">
			<div class="content-wrapper dash-title">
				<div class="featured-heading"><?php echo $title; ?></div>
				<div class="featured-link">Click to View</div>
			</div>
			<?php if($overlay_toggle == 'On'){
				echo "<span class='media_overlay'></span>";
				}
			?>
		</a>
		<?php	
		}
		}
		
	?>
	
<!--
	<a href="<?php echo home_url() . '/lbi-collection'; ?>" class="feature" style="background-image:url(<?php echo get_template_directory_uri() . '/inc/images/collection_sample.jpg'; ?>);">
		<div class="content-wrapper dash-title">
			<div class="featured-heading">LBI Collection</div>
			<div class="featured-link">Click to View</div>
		</div>
	</a>

	<a href="<?php echo home_url() . '/in-the-news'; ?>" class="feature" style="background-image:url(<?php echo get_template_directory_uri() . '/inc/images/news_sample.jpg'; ?>);">
		<div class="content-wrapper dash-title">
			<div class="featured-heading">Recent News</div>
			<div class="featured-link">Read More</div>
		</div>
	</a>
	
-->
</div>