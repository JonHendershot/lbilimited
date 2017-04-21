<?php
/**
 * __replace_this_theme_name__ Theme Customizer
 *
 * @package __replace_this_theme_name__
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function __replace_this_theme_name___customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '__replace_this_theme_name___customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function __replace_this_theme_name___customize_preview_js() {
	wp_enqueue_script( '__replace_this_theme_name___customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', '__replace_this_theme_name___customize_preview_js' );
