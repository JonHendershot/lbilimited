<?php
	
/**
 * Theme Option Page Example
 */
function lbilmited_menu()
{
  add_theme_page( 'Theme Option', 'LBI Options', 'manage_options', 'lbilimited_options.php', 'lbilmited_page');  
}
add_action('admin_menu', 'lbilmited_menu');

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */ 
function lbilmited_page()
{
?>
    <div class="section panel">
      <h1>LBI Limited - Theme Options</h1>
      <hr>
      <form method="post" enctype="multipart/form-data" action="options.php" id="admin-options">
        <?php 
          settings_fields('lbilimited_options'); 
        
          do_settings_sections('lbilimited_options.php');
        ?>
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>  
            
      </form>
      
    </div>
    <?php
}

/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'LBI_register_settings' );

/**
 * Function to register the settings
 */
function LBI_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'lbilimited_options', 'lbilimited_options', 'LBI_validate_settings' );

    // Add settings section
    add_settings_section( 'LBI_contact_section', 'Contact Information', 'LBI_display_section', 'lbilimited_options.php' );
    add_settings_section( 'LBI_social_section', 'Social Links', 'LBI_display_section', 'lbilimited_options.php' );
    add_settings_section( 'LBI_footer_section', 'Site Footer Options', 'LBI_display_section', 'lbilimited_options.php' );
    add_settings_section( 'LBI_search_section', 'Search Results Page', 'LBI_display_section', 'lbilimited_options.php' );
    add_settings_section( 'LBI_404_section', '404 Error Page', 'LBI_display_section', 'lbilimited_options.php' );
    add_settings_section( 'LBI_misc_section', 'Miscellaneous', 'LBI_display_section', 'lbilimited_options.php' );

    
    
    ////////////////////////////////////
    // - - - - SOCIAL OPTIONS - - - - //
    ////////////////////////////////////    
    
    
	    // Facebook
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_facebook',
	      'name'      => 'LBI_facebook',
	      'desc'      => 'Facebook Social Link',
	      'std'       => '',
	      'label_for' => 'LBI_facebook',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_facebook', 'Facebook Link', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
	    
	    // Instagram
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_instagram',
	      'name'      => 'LBI_instagram',
	      'desc'      => 'Instagram Link',
	      'std'       => '',
	      'label_for' => 'LBI_instagram',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_instagram', 'Instagram Link', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
	    
	    
	    // Twitter
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_twitter',
	      'name'      => 'LBI_twitter',
	      'desc'      => 'Twitter Social Link',
	      'std'       => '',
	      'label_for' => 'LBI_twitter',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_twitter', 'Twitter Link', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
	    
	    // YouTube
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_youtube',
	      'name'      => 'LBI_youtube',
	      'desc'      => 'Youtube Social Link',
	      'std'       => '',
	      'label_for' => 'LBI_youtube',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_youtube', 'YouTube Link', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
	    
	        
	    
	    
		// Search Header Image Upload
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_logo',
	      'name'      => 'LBI_logo',
	      'desc'      => '<input data-category="LBI_logo" class="left-float image-trigger" type="button" value="Upload Image"><p>Company Logo for Site Header</p>',
	      'std'       => '',
	      'label_for' => 'LBI_logo',
	      'class'     => ' left-float header_image LBI_logo'
	    );
	
	    add_settings_field( 'LBI_logo', 'Header Logo', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
	    
	    // Alternate Header Logo Color
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_logo_alt1',
	      'name'      => 'LBI_logo_alt1',
	      'desc'      => '<input data-category="gfa-alt" class="left-float image-trigger" type="button" value="Upload Image"><p>Alternate Header Logo</p>',
	      'std'       => '',
	      'label_for' => 'know-your-world-header',
	      'class'     => ' left-float header_image gfa-alt'
	    );
	
	    add_settings_field( 'LBI_logo_alt1', 'Header Logo - Alternate 1', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_social_section', $field_args );
    
    
    ////////////////////////////////////
    // - - - - FOOTER OPTIONS - - - - //
    ////////////////////////////////////
    
    
    
	// Recent News Photo
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'in-the-news-photo',
	      'name'      => 'in-the-news-photo',
	      'desc'      => '<input data-category="in-the-news-photo" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display the Recent News call to action, should it be displayed</p>',
	      'std'       => '',
	      'label_for' => 'footer_background',
	      'class'     => ' left-float header_image in-the-news-photo'
	    );
	    add_settings_field( 'in-the-news-photo', 'Recent News Background Photo', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    

    // Recent News Overlay
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'in-the-news-overlay',
	      'name'      => 'in-the-news-overlay',
	      'desc'      => '<select class="in-the-news-overlay" data-input="in-the-news-overlay"><option value="On">On</option><option value="Off">Off</option></select><p>Turn on if using a light photo to set a transparent dark overlay so that text remains visible</p>',
	      'std'       => '',
	      'label_for' => 'in-the-news-overlay',
	      'class'     => ' css_class in-the-news-overlay i_select'
	    );
	
	    add_settings_field( 'in-the-news-overlay', 'Recent News Image Overlay Toggle', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );

	
	// Current Offerings Photo
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'current-offerings-photo',
	      'name'      => 'current-offerings-photo',
	      'desc'      => '<input data-category="current-offerings-photo" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display the Current Offerings call to action, should it be displayed</p>',
	      'std'       => '',
	      'label_for' => 'footer_background',
	      'class'     => ' left-float header_image current-offerings-photo'
	    );
	    add_settings_field( 'current-offerings-photo', 'Current Offerings Background Photo', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );

    // Current Offerings Overlay
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'current-offerings-overlay',
	      'name'      => 'current-offerings-overlay',
	      'desc'      => '<select class="current-offerings-overlay" data-input="current-offerings-overlay"><option value="On">On</option><option value="Off">Off</option></select><p>Turn on if using a light photo to set a transparent dark overlay so that text remains visible</p>',
	      'std'       => '',
	      'label_for' => 'current-offerings-overlay',
	      'class'     => ' css_class current-offerings-overlay i_select'
	    );
	
	    add_settings_field( 'current-offerings-overlay', 'Current Offerings Image Overlay Toggle', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );

	// Past Offerings Photo
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'past-offerings-photo',
	      'name'      => 'past-offerings-photo',
	      'desc'      => '<input data-category="past-offerings-photo" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display the Past Offerings call to action, should it be displayed</p>',
	      'std'       => '',
	      'label_for' => 'footer_background',
	      'class'     => ' left-float header_image past-offerings-photo'
	    );
	    add_settings_field( 'past-offerings-photo', 'Past Offerings Background Photo', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
    // Past Offerings Overlay
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'past-offerings-overlay',
	      'name'      => 'past-offerings-overlay',
	      'desc'      => '<select class="past-offerings-overlay" data-input="past-offerings-overlay"><option value="On">On</option><option value="Off">Off</option></select><p>Turn on if using a light photo to set a transparent dark overlay so that text remains visible</p>',
	      'std'       => '',
	      'label_for' => 'past-offerings-overlay',
	      'class'     => ' css_class past-offerings-overlay i_select'
	    );
	
	    add_settings_field( 'past-offerings-overlay', 'Past Offerings Image Overlay Toggle', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
	// Collection Photo
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'collection-photo',
	      'name'      => 'collection-photo',
	      'desc'      => '<input data-category="collection-photo" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display the LBI Collection call to action, should it be displayed</p>',
	      'std'       => '',
	      'label_for' => 'footer_background',
	      'class'     => ' left-float header_image collection-photo'
	    );
	    add_settings_field( 'collection-photo', 'Collection Background Photo', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );

    // Collection Overlay
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'collection-overlay',
	      'name'      => 'collection-overlay',
	      'desc'      => '<select class="collection-overlay" data-input="collection-overlay"><option value="On">On</option><option value="Off">Off</option></select><p>Turn on if using a light photo to set a transparent dark overlay so that text remains visible</p>',
	      'std'       => '',
	      'label_for' => 'collection-overlay',
	      'class'     => ' css_class collection-overlay i_select'
	    );
	
	    add_settings_field( 'collection-overlay', 'Collection Image Overlay Toggle', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
    
    
    
    
	    // Footer CTA
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_f_CTA',
	      'name'      => 'LBI_f_CTA',
	      'desc'      => 'Heading to initiate the call to action to signing up for newsletter',
	      'std'       => '',
	      'label_for' => 'LBI_f_CTA',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_f_CTA', 'Newsletter CTA Heading', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	
		// Footer CTA Subtitle
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_f_CTA_sub',
	      'name'      => 'LBI_f_CTA_sub',
	      'desc'      => 'Subtitle text for the newsletter CTA',
	      'std'       => '',
	      'label_for' => 'LBI_f_CTA_sub',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_f_CTA_sub', 'Newsletter CTA Subtitle', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );   
	       
	    // Footer CTA Mailing-list Shortcode to capture subscriptions
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_f_mailer_shortcode',
	      'name'      => 'LBI_f_mailer_shortcode',
	      'desc'      => 'Shortcode for mailing-list subscription form',
	      'std'       => '',
	      'label_for' => 'LBI_f_mailer_shortcode',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_f_mailer_shortcode', 'Mailer Shortcode', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	        
	    // Footer CTA Background
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'footer_background',
	      'name'      => 'footer_background',
	      'desc'      => '<input data-category="footer-bg" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display behind newsletter CTA</p>',
	      'std'       => '',
	      'label_for' => 'footer_background',
	      'class'     => ' left-float header_image footer-bg'
	    );
	
	    add_settings_field( 'footer_background', 'Footer Background', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
	    // Footer Overlay
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => 'footer_overlay',
		      'name'      => 'footer_overlay',
		      'desc'      => '<select class="footer_overlay" data-input="footer_overlay"><option value="On">On</option><option value="Off">Off</option></select><p>Turn on if using a light photo to set a transparent dark overlay so that text remains visible</p>',
		      'std'       => '',
		      'label_for' => 'footer_overlay',
		      'class'     => ' css_class footer_overlay i_select'
		    );
		
		    add_settings_field( 'footer_overlay', 'Footer Image Overlay', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
	    // Footer Copyright
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_f_copyright',
	      'name'      => 'LBI_f_copyright',
	      'desc'      => 'Copyright text for site footer',
	      'std'       => '',
	      'label_for' => 'LBI_f_copyright',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_f_copyright', 'Footer Copyright', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
	    
	
	    // Footer Email
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'LBI_f_email',
	      'name'      => 'LBI_f_email',
	      'desc'      => 'Email address to be displayed in site footer',
	      'std'       => '',
	      'label_for' => 'LBI_f_email',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'LBI_f_email', 'Footer Email Address', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_footer_section', $field_args );
    
    
	////////////////////////////////////
    // - - - - SEARCH OPTIONS - - - - /
    //////////////////////////////////
	
		// Search Results Header
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => 'results_header',
		      'name'      => 'results_header',
		      'desc'      => '<input data-category="results_header" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display in Search Results header</p>',
		      'std'       => '',
		      'label_for' => 'results_header',
		      'class'     => ' left-float header_image results_header'
		    );
		
		    add_settings_field( 'results_header', 'Results Header', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_search_section', $field_args );
		    
		// Search Framing
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => 'results_frame',
		      'name'      => 'results_frame',
		      'desc'      => '<select class="results_frame" data-input="results_frame"><option value="top">Top</option><option value="center">Center</option><option value="bottom">Bottom</option></select><p>How the header image frames up</p>',
		      'std'       => '',
		      'label_for' => 'results_frame',
		      'class'     => ' css_class results_frame i_select'
		    );
		
		    add_settings_field( 'results_frame', 'Search Results Framing', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_search_section', $field_args );
		    
    
	 ///////////////////////////////////
    // - - - ERROR 404 OPTIONS - - - //
   ///////////////////////////////////
   
	    // 404 Header Image
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => '404_header',
		      'name'      => '404_header',
		      'desc'      => '<input data-category="404_header" class="left-float image-trigger" type="button" value="Upload Image"><p>Image to Display in Search Results header</p>',
		      'std'       => '',
		      'label_for' => 'results_header',
		      'class'     => ' left-float header_image 404_header'
		    );
		
		    add_settings_field( '404_header', '404 Header', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_404_section', $field_args );
		
		// 404 Framing
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => '404_frame',
		      'name'      => '404_frame',
		      'desc'      => '<select class="404_frame" data-input="404_frame"><option value="top">Top</option><option value="center">Center</option><option value="bottom">Bottom</option></select><p>How the header image frames up</p>',
		      'std'       => '',
		      'label_for' => '404_frame',
		      'class'     => ' css_class 404_frame i_select',
		    );
		
		    add_settings_field( '404_frame', '404 Framing', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_404_section', $field_args );
	
	
	
    ////////////////////////////////////
    // - - - - MISCELLANEOUS - - - - //
    //////////////////////////////////
    
    
	    // Offering Contact Form
	    $field_args = array(
	      'type'      => 'text',
	      'id'        => 'offering_form',
	      'name'      => 'offering_form',
	      'desc'      => 'Shortcode for the contact form to be displayed on the Current Offerings single page',
	      'std'       => '',
	      'label_for' => 'offering_form',
	      'class'     => 'css_class'
	    );
	
	    add_settings_field( 'offering_form', 'Offerings Contact Form Shortcode', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_misc_section', $field_args );
	    
		// Image For Loading Screen
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => 'loading_img',
		      'name'      => 'loading_img',
		      'desc'      => '<input data-category="loading_img" class="left-float image-trigger" type="button" value="Upload Image"><p>Logo Image to Display in on Loading Screen</p>',
		      'std'       => '',
		      'label_for' => 'loading_img',
		      'class'     => ' left-float header_image loading_img'
		    );
		
		    add_settings_field( 'loading_img', 'Loading Screen Icon', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_misc_section', $field_args );
		    
		    
		// Default image for blog posts
		    $field_args = array(
		      'type'      => 'text',
		      'id'        => 'blog_img',
		      'name'      => 'blog_img',
		      'desc'      => '<input data-category="blog_img" class="left-float image-trigger" type="button" value="Upload Image"><p>Default image to display as the featured image for blog postse</p>',
		      'std'       => '',
		      'label_for' => 'blog_img',
		      'class'     => ' left-float header_image blog_img'
		    );
		
		    add_settings_field( 'blog_img', 'Default Blog Image', 'LBI_display_setting', 'lbilimited_options.php', 'LBI_misc_section', $field_args );
	

}

	/**
 * Function to add necessary scripts and styles
 */
 
add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {
        wp_enqueue_media();
        wp_register_script('my-admin-js',get_template_directory_uri() . '/js/options_admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
        
        wp_register_style('lbi-admin-css', get_template_directory_uri() . '/inc/css/lbi-admin.css', array());
        wp_enqueue_style('lbi-admin-css');
}

/**
 * Function to add extra text to display on each section
 */
function LBI_display_section($section){ 

}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function LBI_display_setting($args)
{
    extract( $args );

    $option_name = 'lbilimited_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function LBI_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
/*
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
*/
  }

  return $newinput;
}


?>