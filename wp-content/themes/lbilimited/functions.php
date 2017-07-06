<?php
/**
 * lbilimited functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lbilimited
 */

if ( ! function_exists( 'lbilimited_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lbilimited_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lbilimited, use a find and replace
	 * to change 'lbilimited' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lbilimited', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'lbilimited' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lbilimited_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'lbilimited_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lbilimited_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lbilimited_content_width', 640 );
}
add_action( 'after_setup_theme', 'lbilimited_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lbilimited_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lbilimited' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lbilimited' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lbilimited_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lbilimited_scripts() {
	wp_enqueue_style( 'lbilimited-style', get_stylesheet_uri() );
	wp_enqueue_style('lbi_styles', get_template_directory_uri() . '/scss/main.css', array(), '1.0.1', '');
	wp_enqueue_style('owl_carousel', get_template_directory_uri() . '/inc/css/owl.carousel.min.css', array(), '2.2.1', '');
	
	// Regist Scripts
	wp_register_script('owl_carousel', get_template_directory_uri() . '/inc/js/owl.carousel.min.js', array(), '2.2.1', true);
	wp_register_script('mousewheel',get_template_directory_uri() . '/inc/js/jquery.mousewheel.min.js', array(), '1.0.1', true);
	wp_register_script('scroller',get_template_directory_uri() . '/inc/js/jquery.jscrollpane.min.js', array('mousewheel'), '1.0.1', true);
	wp_register_script('packery_layout',get_template_directory_uri() . '/inc/js/node_modules/packery/dist/packery.pkgd.min.js', array(), '1.0.1', true);

	wp_register_script('isotope', get_template_directory_uri() . '/inc/js/node_modules/isotope-layout/dist/isotope.pkgd.min.js', array('packery_layout'), '4.2.0', true);
	
	// Enqueue Scripts
	wp_enqueue_script( 'lbilimited-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'lbilimited-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'lbilimited_main', get_template_directory_uri() . '/js/lbilimited.js', array('jquery','packery_layout','owl_carousel', 'scroller', 'isotope'), '1.0.1', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lbilimited_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load theme options file.
 */
require get_template_directory() . '/theme_options.php';

/**
 * Let's add some custom styles to the admin pages
 */
function load_custom_wp_admin_style() {
       wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/scss/admin-style.css', false, '1.0.0' );
       wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/**
 * A function to retrieve the image id from the URL
 */
 function get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

  //////////////////////////////////////////
 /// Incerase Max Size of Media Uploads ///
//////////////////////////////////////////
/*
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
*/

  //////////////////////////////////////////////////////
 /// Add an image size to use for blur placeholders ///
//////////////////////////////////////////////////////
	add_image_size('blur',60,60);
	
  ///////////////////////////////////////////////////////////
 /// Functions to handle the page navigation on archives ///
///////////////////////////////////////////////////////////


// Add page numbers
function get_page_numbers() {
	global $wp_query;
	$posts_per_page = get_option( 'posts_per_page' );
	$total_posts = $wp_query->found_posts;
	$paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
	$page_count = ceil( $total_posts / $posts_per_page );
	$post_type = get_post_type();
	$url = get_post_type_archive_link( $post_type );
	$output = array($page_count);
	$content = '';
	
	$content .= "<div class='pagination'>";
	
	for($ii = 1; $ii <= $page_count; $ii++){
		if($ii === $paged){
			$class = 'active';
		}else {
			$class = '';
		}
		if( is_search() ){
			$query = get_search_query();
			$url = home_url();
			$content .= "<a href='{$url}/page/$ii/?s=$query#archive-wrapper' class='$class'>$ii</a>";

		}else {
			$content .= "<a href='{$url}page/$ii/#archive-wrapper' class='$class'>$ii</a>";
		}
	}
	
	$content .= "</div>";
	
	array_push($output, $content);
	
	
	return $output;
}

// Add an anchor to next_posts_link and previous_posts_link 
add_filter('get_pagenum_link', 'archive_anchor');

function archive_anchor($url) {
    return $url . '#archive-wrapper';
}


// Add classes to the post navigation links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="posts-nav-link"';
}

  ////////////////////////////////////////////////
 /// Function to create contact form sections ///
////////////////////////////////////////////////
// This allows us to build the same contact form setup in multiple templates with dynamic content
// by passing an array through the function and creating a form wrapper for each object in the array
// A template module file would be tough to pass an object to and maintain dry code, so we'll use this function instead
function lbi_contact($form_array, $id){
	
	$output = '';
	$offering_title = '';
	$post_type = get_post_type();
	$heading_class = 'tilt_title';
	
	
	// Set form heading title
		if( $post_type == 'offerings' ){
			$form_heading = 'Inquire Below';
			$heading_class .= ' flip';
			$offering_title = get_the_title();
		}else {
			$form_heading = 'Drop A Line';
			
		}
	
	// Build front end of the section frame
		$output .= "<section class='contact_form form_$id' data-car='$offering_title'>
					<h4 class='$heading_class'>$form_heading</h4>";

	// Build form section for each form passed
	
		foreach($form_array as $id => $form){
			$form_title = $form['title'];
			$form_output = do_shortcode($form['shortcode']);
			$output .= "<div class='$form_title-container form-$id'>$form_output</div>";
		}
		
	// Wrap up the section frame
		$output .= "</section>";
		
	// Send it 
		echo $output;
		
}

  /////////////////////////////////////////////////////
 /// Function to create a custom gallery shortcode ///
/////////////////////////////////////////////////////
// The LBI Collections and News posts each have an option to upload a 
// gallery of images that can be embedded in the content. On the front end of the site,
// this gallery is displayed somewhere within the written content to break it up. The 
// easiest way to accomplish this is to create a shortcode that can be embedded anywhere
// in the post content. We'll do that here. 

function lbi_single_gallery( $atts ){
	if( ! empty( $atts['id'] ) ){
		$gallery_id = $atts['id'];
		
		if($gallery_id == 1){
			// A multi-gallery feature was implemented late, so the numbering system for gallery loops
			// wasn't a core feature of this site. But, we need to keep the field name for each of the
			// existing first galleries the same as to not break meta-data information, so we'll need to
			// simply detect if were calling the first gallery and, if not, append the gallery number to the
			// slug so that this function calls the proper gallery. 
			$gallery_slug = "post_gallery";
		}else {
			$gallery_slug = "post_gallery_$gallery_id";
		}
	}
	
	$gallery = get_field($gallery_slug);
	$first_image = $gallery[0]['url'];
	$first_alt = $gallery[0]['alt'];
	$loop_index = 0;
	$output = '';
	
	// Build the post Gallery and put the first image in the viewer
	$output .= "<div class='post_gallery_wrapper featured_image_showcase visible margin'>
					<div class='post_gallery'>
						<div class='image_viewer'>
							<img src='$first_image' alt='$first_alt' />
						</div>
						<div class='featured_image_slider_container'>
							<div class='featured_image_slider_wrapper'>";
	
	// Loop through gallery array and add an image object to $output for each photo
	foreach($gallery as $key=>$photo){
		// Variables
			$med_url = $photo['sizes']['medium_large'];
			$blur_url = $photo['sizes']['blur'];
			$full_url = $photo['url'];
			$alt = $photo['alt'];
			
			// Store Variables in an array
			$img_info = array(
				'medium_url' => $med_url,
				'blur_url' => $blur_url,
				'full_url' => $full_url,
				'photo_id' => $loop_index
			);
			
			// Translate array into a JSON object to be stored in the markup
			$img_data = array_map('utf8_encode', $img_info);
			$img_json = json_encode($img_data);
			
			// In case a lot of images are uploaded to this gallery, we'll dynamically control the <img> for lazy-loading, 	
				if($loop_index > 7){
					$img = "<img src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$med_url' alt='$alt' class='lazy-load' />";
				}else {
					$img = "<img src='$med_url' alt='$alt' />";
				}
			
			// Add the image object to $output
			$output .= "<div class='featured_slide slide-$loop_index' data-image='$img_json' data-id='$loop_index'>$img</div>";
						
			// Increment $loop_index to control lazyloading
			$loop_index++;
	}
					
	// Close the .image_slider, .post_gallery, and .post_gallery_wrapper
	$output .= "</div></div></div></div>";
	
	// Output $output
	return $output;
}
add_shortcode('photos', 'lbi_single_gallery');




  //////////////////////////////////////////////////////
 /// Function to produce the image thumbnail slider ///
//////////////////////////////////////////////////////
function lbi_image_slider($image_array){
	
}

  //////////////////////////////////////////////////////////////
 /// Function to add a 'Make' taxonomy to offerings & media ///
//////////////////////////////////////////////////////////////
function create_make_tax(){
	register_taxonomy('make', array('lbi_media'), array(
		'label' => __('Make'),
		'rewrite' => array('slug' => 'make'),
		'hierarchical' => true
	));
}
add_action('init','create_make_tax');


  ///////////////////////////////////////////////////////////////
 /// Function to add a 'Offering Type' taxonomy to offerings ///
///////////////////////////////////////////////////////////////
function create_offering_tax(){
	register_taxonomy('offering_type', array('offerings'), array(
		'label' => __('Offering Type'),
		'rewrite' => array('slug' => 'offering_type'),
		'hierarchical' => true
	));
}
add_action('init','create_offering_tax');

  ////////////////////////////////////////////////////////////////////
 /// Filter to wrap any embeds in a content div for the_content() ///
////////////////////////////////////////////////////////////////////
// This will allow us to control the aspect ratio of iframe embeds

function div_wrapper($content) {
    // match any iframes
    $pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
    preg_match_all($pattern, $content, $matches);

    foreach ($matches[0] as $match) {
        // wrap matched iframe with div
        $wrappedframe = '<div class="iframe_wrapper">' . $match . '</div>';

        //replace original iframe with new in content
        $content = str_replace($match, $wrappedframe, $content);
    }

    return $content;    
}
add_filter('the_content', 'div_wrapper');


  ////////////////////////////////////////////////////////////////////
 /// Function to return offerings titles based on year make model ///
////////////////////////////////////////////////////////////////////
function offering_title(){
		$year = get_field('year');
		$make = get_field('make');
		$model = get_field('model');
		
		// if we have enough delineated information, we'll set year make model to break out, otherwise we'll just use the normal post title
		if( $year && $make ){
			$title = "<span class='layer-0'>$year</span><span class='layer-1'>$make</span><span class='layer-2'>$model</span>";
		}else {
			$title_content = get_the_title();
			$title = "<span>$title_content</span>";
		}
		
		return $title;
	
}

  //////////////////////////////////////////////////////////////////////////
 /// Function to add information to wp_lbi_notify on notify form submit ///
//////////////////////////////////////////////////////////////////////////
// The theme has a function where users can be notified if an offering is posted
// based on a certain criteria (year, make, model). The form collects that information
// and stores it in a db table with their email. This is the function that does that

add_action('wpcf7_mail_sent','save_notification_data');

function save_notification_data( $contact_form ){
	
	$form_id = $contact_form->id();
	$notify_id = 72611; // the form id of the notification form
	
	if($form_id === $notify_id){
		global $wpdb;
 
		/*
		Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
		and now we use an API to get the posted data.
		*/
		
		
	    $submission = WPCF7_Submission::get_instance();
	  
	    if ( $submission ) {
	    	$posted_data = $submission->get_posted_data();
	    }
		
		$name = $posted_data['your-name'];
		$email = $posted_data['your-email'];
		$vehicle_year = $posted_data['vehicle-year'];
		$vehicle_make = $posted_data['vehicle-make'];
		$vehicle_model = $posted_data['vehicle-model'];
	
		$wpdb->insert( $wpdb->prefix . 'lbi_notify', 
		    array( 
		       'name'  => $name,
		       'email' => $email,
		       'vehicle_year' => $vehicle_year,
		       'vehicle_make' => $vehicle_make,
		       'vehicle_model' => $vehicle_model,
		       'date' => date('Y-m-d H:i:s')
			)
		);

	}
	
}

  ////////////////////////////////////////////////////////////////////
 /// Function to grab a random photo from the palceholders direct ///
////////////////////////////////////////////////////////////////////
function placeholder_image() {

    return get_template_directory_uri() . '/inc/images/placeholders/blog_placeholder_3.jpg';
}


// Delete media associated to a post when the post is deleted
// Might customize this to only apply to the offerings posts as an offering can 500+ photos tagged to it
/*
function delete_post_children($post_id) {
	global $wpdb;

	$ids = $wpdb->get_col("SELECT ID FROM {$wpdb->posts} WHERE post_parent = $post_id AND post_type = 'attachment'");

	foreach ( $ids as $id )
		wp_delete_attachment($id);
}
add_action('delete_post', 'delete_post_children');
*/

function update_past_offerings_media(){
		
	////////////
	// Select all past-offerings posts 
	////////////
	wp_reset_query();
	$args = array(
		'post_type' => 'offerings',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'offering_type',
				'terms' => 265	
			)
		)
	);
	$query = new WP_Query( $args );
	
	////////////
	// WHILE past-offerings post
	////////////
	while( $query->have_posts() ) : $query->the_post();
		
		////////////
		// Select the post ID 
		////////////
		$offering_id = get_the_ID();
		
			
		////////////
		// Only run for posts > ID = 350 to exclude sample posts
		////////////
		if( $offering_id > 350 ) {

		
			////////////
			// Get all image attachments for this post
			////////////	
			$media = get_posts(array(
			    'post_parent' => $offering_id,
			    'post_type' => 'attachment',
			    'post_mime_type' => 'image/jpeg',
			    'orderby' => 'post_date',
			    'order' => 'ASC',
			    'posts_per_page' => -1
			));
			
			////////////
			// See how many image attachments have been uploaded to this post and establish the gallery meta_value
			// 		as per WP docs, the meta_value should be passed as a raw array - the database will serialize it before 
			//		it's inserted, so we just need to save each image post ID as an array value
			////////////
			$meta_value_array = array();
			
			////////////
			// FOR EACH image uploaded to this post 
			////////////
			foreach($media as $image){
				
			
				////////////
				// Get this image's ID information
				////////////
					$photo_id = $image->ID;

				
				////////////
				// Append this image's id information to $meta_value_array
				////////////
					$meta_value_array[] = $photo_id;
					
					
			////////////
			// End for each
			////////////
			}

			
			////////////
			// Uncomment to output the number of elements matched and the $meta_value_array to check our work
			////////////
/*
				echo "<pre>";
					print_r($media);
				echo "</pre>";
*/
			
			////////////
			// Update the posts meta information with $meta_value
			////////////
			update_post_meta( $offering_id, 'exterior_glam', $meta_value_array);


			
		////////////
		// END if: ID>350
		////////////
		}
				
	////////////
	// End WHILE past-offerings post
	////////////
	endwhile;
}



function get_archive_page_num( $post_id ){
	
	$post_type = get_post_type( $post_id );
	$index = '';
	$archive_page_number = '';
	$per_page = get_option('posts_per_page');
	
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order' => 'DESC'
	);
	
	$posts = get_posts( $args );
	foreach($posts as $key=>$post){
		$this_id = $post->ID;
		
		if($this_id === $post_id){
			$index = $key;
			$archive_page_number = ceil( $index / $per_page );
		}
	}
	
	return $archive_page_number;
	
}


  /////////////////////////////////////////////////////////////////////////////
 /// Function to get the price of an offering - to be used inside the post ///
/////////////////////////////////////////////////////////////////////////////
function get_offering_price(){
	
	$price_option = get_field('display_type');
	
	if( $price_option ){
		if( $price_option == 'display-price' ){
		
			$price_value = get_field('price');
			if( $price_value ){
				$price = 'Offered at: $' . number_format($price_value,0,".",",");
			}else {
				$price = false;
			}
			
		}else if( $price_option == 'other' ){
			$other_field = get_field('price_field_other');
			$price = $other_field;
		}else {
			$price = $price_option;
		}
	}else if( has_term( 265, 'offering_type' ) ){ // if in past offerings
		$price = 'Sold';
	} else {
		$price = false;
	}

	return $price;
	
}

  //////////////////////////////////////////////////////////////////
 /// Function to check if an offering category has photos in it ///
//////////////////////////////////////////////////////////////////
function offering_has_photos($array){
	
	$has_images = false;
	
	foreach($array as $category){
		if( ! empty($category) ){
			$has_images = true;
		}
	}
	
	return $has_images;
}


  //////////////////////////////////////////////////////////////////
 /// Function to remove featured image box from blog post type ///
//////////////////////////////////////////////////////////////////

add_action('do_meta_boxes', 'remove_thumbnail_box');

function remove_thumbnail_box() {
    remove_meta_box( 'postimagediv','post','side' );
}

  /////////////////////////////////////////////////////////////////////////////
 /// Function to return appropriate media content based on what type it is ///
/////////////////////////////////////////////////////////////////////////////
function get_media($file){
	$file_type = $file['mime_type'];
	$file_class = $file['type'];
	$file_url = $file['url'];
	$file_alt = $file['alt'];
	$output = "<div class='featured_media'>";
	

	
	if( $file_class == 'video' ){
		$src = $file_url;
		$output .= "<video id='social-video' autoplay loop muted>
					  		<source data-src='$src' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' type='$file_type' class='lazy-load'></source>
					  	</video>";
	}
	if( $file_class == 'image' ){
		$src = $file['sizes']['large'];
		$output .= "<img data-src='$src' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' alt='$file_alt' class='lazy-load'/>";
	}
	
	$output .= "</div>";
	return $output; 
}


  //////////////////////////////////////////////////////////////////////
 /// Function to replace an input with letters wrapped in span tags ///
//////////////////////////////////////////////////////////////////////

function span_per_letter($input){
	
	// Create DOM document and load HTML string, hinting that it is UTF-8 encoded.
	// We need a root element for this so we wrap the source in a temporary <div>.
	$hint = '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
	$dom = new DOMDocument();
	$dom->loadHTML($hint . "<div>" . $input . "</div>");
	
	// Get contents of temporary root node
	$root = $dom->getElementsByTagName('div')->item(0);
	
	// Loop through children
	$next = $root->firstChild;
	while ($node = $next) {
	    $next = $node->nextSibling; // Save for next while iteration
	
	    // We are only interested in text nodes (not <br/> etc)
	    if ($node->nodeType == XML_TEXT_NODE) {
	        // Wrap each character of the text node (e.g. "Hi ") in a <span> of
	        // its own, e.g. "<span>H</span><span>i</span><span> </span>"
	        foreach (preg_split('/(?<!^)(?!$)/u', $node->nodeValue) as $char) {
	            $span = $dom->createElement('span', $char);
	            $root->insertBefore($span, $node);
	        }
	        // Drop text node (e.g. "Hi ") leaving only <span> wrapped chars
	        $root->removeChild($node);
	    }
	}
	
	// Back to string via SimpleXMLElement (so that the output is more similar to
	// the source than would be the case with $root->C14N() etc), removing temporary
	// root <div> element and space-only spans as well.
	$withSpans = simplexml_import_dom($root)->asXML();
	$withSpans = preg_replace('#^<div>|</div>$#', '', $withSpans);
	$withSpans = preg_replace('#<span> </span>#', ' ', $withSpans);
	
	return $withSpans;
}


  //////////////////////////////////////////////////////////////////////
 /// Function to replace an input with words wrapped in span tags ///
//////////////////////////////////////////////////////////////////////
function span_per_word($input){
	$output = preg_replace('([a-zA-Z.,!?0-9]+(?![^<]*>))', '<span class="word">$0</span>', $input);
	
	return $output;
}


  ////////////////////////////////////////////////////////////////////////////
 /// Function to frame the AJAX load-more-posts function on archive pages ///
////////////////////////////////////////////////////////////////////////////

function ajax_load_more() {
 	if( is_page_template('templates/offerings.php') || is_home() ){
	// register our main script but do not enqueue it yet
	wp_register_script( 'load_more', get_template_directory_uri() . '/js/loadmore.js', array('jquery'), true );
 
	
	
	
	// a bit hacky as of right now, but we're able to determine if were ont he offerings post type archive 
	// by detecting a certain field that is specific to those pages
	// if that field is present, use the offerings query logic, if not, use the default post type (for blog posts)
	// offerings and news are the only to pages that are lazy-loaded with AJAX

	// establish list of categories to check later
	$category_list = array(
			'past' => 265,
			'current' => 264
		);
	// get the offering-archive-specific field
	$offering_category = get_field('display_content');
	
	
	// if that field exists, frame the query arguments for offerings
	if($offering_category){
		
		$category_id = $category_list[$offering_category];		

		
		$args = array(
			'post_type' => 'offerings',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'offering_type',
					'terms' => $category_id	
				)
			)
		);
	}
	// if not, default the arguments to query the blog posts
	else {
		$args = array(
			'post_type' => 'post'
		);
	}
	
	// establish a new query
	$q = new WP_Query($args);

 
	// Un-comment the next three lines to check the query array for debugging
//	echo "<pre>";
//	print_r($q->query_vars);
//	echo "</pre>";

 
	// now the most interesting part
	// we have to pass parameters to loadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'load_more', 'load_more_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => serialize( $q->query_vars ), // everything about your loop is here
		'current_page' => $q->query_vars[ 'paged' ] ? $q->query_vars[ 'paged' ] : 1,
		'max_page' => $q->max_num_pages
	) );
 
 	wp_enqueue_script( 'load_more' );
 	}
}


	add_action( 'wp_enqueue_scripts', 'ajax_load_more' );

	


  //////////////////////////////////////////////////////////
 /// AJAX handler for the load-more-posts functionality ///
//////////////////////////////////////////////////////////

function ajax_load_more_handler(){
 

 
	// prepare our arguments for the query
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	
	// it is always better to use WP_Query but not here
	query_posts( $args );
	
	// Un-comment the next three lines to check the query array for debugging
//	echo "<pre>";
//	print_r( $args );
//	echo "</pre>";

 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			$post_type = get_post_type();
			$archive_slug = $post_type . '_loop';
			get_template_part( 'template-parts/module', $archive_slug );
			// for the test purposes comment the line above and uncomment the below one
// 			the_title();
			
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'ajax_load_more_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'ajax_load_more_handler'); // wp_ajax_nopriv_{action}


  ////////////////////////////////////////////////////////////
 /// Function to check if taxonomy has posts inside of it ///
////////////////////////////////////////////////////////////
function tax_has_posts($id, $taxonomy, $threshold){
	$term = get_term_by('id', $id, $taxonomy);
	$has_posts = false;
	
	if($term != false){
		if( $term->count >= $threshold){
			// the post type has more than one post! 
			$has_posts = true;
		}
	}
	return $has_posts;
}