<?php
	
	// Template Name: LBI Collection
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Collection content, which utilized Gridlock
	// Content loop can be found in template-parts/module-gridlock.php
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Invoke site header
		get_header();
	
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
	
	// Invoke wp loop
		get_template_part('template-parts/module', 'gridlock');

	// Invoke site footer
		get_footer();
?>