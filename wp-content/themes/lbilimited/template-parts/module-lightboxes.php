<div class="search_form_container lbi_lightbox">
	<?php get_search_form(); ?>
	<div class="ribbon"></div>
</div>

<?php
	
	if( is_single() ){
		// Media Lightbox
			get_template_part('template-parts/module', 'media_lightbox');
		
		// Documents Lightbox 
			$documents_repeater = 'offering_documents';	
			
			// Offering Documents
				if( have_rows($documents_repeater) ) :
					$post_title = get_the_title($post->ID);
					// Build documents lightbox display
						echo "<div class='documents_lightbox lbi_lightbox'>
								<div class='ribbon'></div>
								<h3>$post_title</h3>
								<div class='document_links lightbox_content'>";
						
							while( have_rows($documents_repeater) ) : the_row();
								// Varialbes
									$title = get_sub_field('document_title');
									$document_file = get_sub_field('document_file');
									$document_path = $document_file['url'];
									
								// Build Links
									echo "<a href='$document_path' target='_blank'>$title</a>";
							endwhile;
						echo "</div></div>";						
				endif;
	}
	if( is_page_template('archive-lbi_media.php') || is_page_template('templates/about.php') ){
		get_template_part('template-parts/module', 'video_lightbox');
		get_template_part('template-parts/module', 'media_lightbox');
	}	
	if( is_page_template('templates/offerings.php') ){
		get_template_part('template-parts/module', 'notify_lightbox');
	}
	if( is_page_template('templates/contact.php') ){
		get_template_part('template-parts/contact', 'consignment_lightbox');
	}
	if( is_front_page() ){
		get_template_part('template-parts/module', 'inquiry_lightbox');
	}