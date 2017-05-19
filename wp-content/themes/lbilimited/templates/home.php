<?php
	
	// Template Name: Home Page
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Home Page 
	// 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Invoke site header
		get_header();
		
	// Invoke sub-heading module
		get_template_part('template-parts/module', 'sub_heading');
		
	// Invoke site footer
		get_footer();