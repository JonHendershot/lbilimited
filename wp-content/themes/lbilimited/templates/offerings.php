<?php
	
	// Template Name: Offerings
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Offerings content, both current and past 
	// Content loop can be found in template-parts/module-offerings_loop.php
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Invoke site header
		get_header();
	
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
	
	// Invoke wp loop
		echo "<section class='offerings-container'>";
		get_template_part('template-parts/module', 'offerings_loop');
		echo "</section>";

	// Invoke site footer
		get_footer();
?>