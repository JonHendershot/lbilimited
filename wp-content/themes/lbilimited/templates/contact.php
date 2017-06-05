<?php
	
	// Template Name: Contact
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Contact Page
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Page Variables
		$content_option = get_field('content_option'); // used to call the appropriate content module
	
	// Invoke site header
		get_header();
	
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
	
	// Call the content module based on which content option is selected in the wordpress dashboard on this page
		get_template_part('template-parts/contact', $content_option);

	// Invoke site footer
		get_footer();
?>