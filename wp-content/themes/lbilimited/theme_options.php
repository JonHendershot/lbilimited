<?php
	
/**
 * Theme Option Page Example
 */
function lbilmited_menu()
{
  add_theme_page( 'Theme Option', 'LBI Options', 'manage_options', 'lbilmited_options.php', 'lbilmited_page');  
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
      <h1>Custom Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php" id="admin-options">
        <?php 
          settings_fields('lbilmited_options'); 
        
          do_settings_sections('lbilmited_options.php');
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
    register_setting( 'lbilmited_options', 'lbilmited_options', 'LBI_validate_settings' );

    // Add settings section
    add_settings_section( 'LBI_contact_section', 'Contact Information', 'LBI_display_section', 'lbilmited_options.php' );
    add_settings_section( 'LBI_text_section', 'Social Links', 'LBI_display_section', 'lbilmited_options.php' );

    
    
    // Create About Title field for Footer
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_fabout_title',
      'name'      => 'LBI_fabout_title',
      'desc'      => 'Footer About Title',
      'std'       => '',
      'label_for' => 'LBI_fabout_title',
      'class'     => 'css_class'
    );

    add_settings_field( 'LBI_fabout_title', 'Footer About Title', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_contact_section', $field_args );
    
     // Create About field for footer
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_fabout_text',
      'name'      => 'LBI_fabout_text',
      'desc'      => 'About paragraph for footer',
      'std'       => '',
      'label_for' => 'LBI_fabout_text',
      'class'     => 'css_class'
    );

    add_settings_field( 'LBI_fabout_text', 'About Text', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_contact_section', $field_args );
    
    // Create field for Know Your World Purchase Link
    $field_args = array(
      'type'      => 'text',
      'id'        => 'kyw_purchase',
      'name'      => 'kyw_purchase',
      'desc'      => 'Link for button at bottom of Know Your World posts',
      'std'       => '',
      'label_for' => 'kyw_purchase',
      'class'     => 'css_class'
    );

    add_settings_field( 'kyw_purchase', 'Know Your World Link', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_contact_section', $field_args );
    
    // Create field for Know Your World Purchase text
    $field_args = array(
      'type'      => 'text',
      'id'        => 'kyw_purchase_text',
      'name'      => 'kyw_purchase_text',
      'desc'      => 'Text for Know Your World Purchase button',
      'std'       => '',
      'label_for' => 'kyw_purchase_text',
      'class'     => 'css_class'
    );

    add_settings_field( 'kyw_purchase_text', 'Know Your World Purchase Text', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_contact_section', $field_args );

    
    
    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_facebook',
      'name'      => 'LBI_facebook',
      'desc'      => 'Facebook Social Link',
      'std'       => '',
      'label_for' => 'LBI_facebook',
      'class'     => 'css_class'
    );

    add_settings_field( 'facebook_link', 'Facebook Link', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    
    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_instagram',
      'name'      => 'LBI_instagram',
      'desc'      => 'Instagram Link',
      'std'       => '',
      'label_for' => 'LBI_instagram',
      'class'     => 'css_class'
    );

    add_settings_field( 'insta_link', 'Instagram Link', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    
    
    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_twitter',
      'name'      => 'LBI_twitter',
      'desc'      => 'twitter Social Link',
      'std'       => '',
      'label_for' => 'LBI_twitter',
      'class'     => 'css_class'
    );

    add_settings_field( 'twitter_link', 'twitter Link', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    
    
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

    add_settings_field( 'LBI_logo', 'Header Logo', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    
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

    add_settings_field( 'LBI_logo_alt1', 'Header Logo - Alternate 1', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    
        
    // Know Your World Header Logo
    $field_args = array(
      'type'      => 'text',
      'id'        => 'know-your-world-logo',
      'name'      => 'know-your-world-logo',
      'desc'      => '<input data-category="kyw-logo" class="left-float image-trigger" type="button" value="Upload Image"><p>Know Your World Archive Page Logo</p>',
      'std'       => '',
      'label_for' => 'know-your-world-logo',
      'class'     => ' left-float header_image kyw-logo'
    );

    add_settings_field( 'know-your-world-logo', 'Know Your World Header Logo', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_text_section', $field_args );
    

// Footer Copyright
    $field_args = array(
      'type'      => 'text',
      'id'        => 'LBI_footer_copy',
      'name'      => 'LBI_footer_copy',
      'desc'      => 'Text for footer copyright',
      'std'       => '',
      'label_for' => 'LBI_footer_copy',
      'class'     => 'css_class'
    );

    add_settings_field( 'LBI_footer_copy', 'Footer Copyright', 'LBI_display_setting', 'lbilmited_options.php', 'LBI_contact_section', $field_args );    
  
}


/**
 * Function to add necessary scripts and styles
 */
 
add_action('admin_enqueue_scripts', 'my_admin_scripts');
 
function my_admin_scripts() {
        wp_enqueue_media();
        wp_register_script('my-admin-js',get_template_directory_uri() . '/js/options_admin.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
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

    $option_name = 'lbilmited_options';

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