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
	
	// Enqueue Scripts
	wp_enqueue_script( 'lbilimited-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'lbilimited-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'lbilimited_main', get_template_directory_uri() . '/js/lbilimited.js', array('jquery','owl_carousel'), '1.0.1', true);

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

  //////////////////////////////////////////////////////
 /// Add an image size to use for blur placeholders ///
//////////////////////////////////////////////////////
	add_image_size('blur',60,60);
	
  ///////////////////////////////////////////////////////////
 /// Functions to handle the page navigation on arrhives ///
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
		$content .= "<a href='{$url}page/$ii/#archive-wrapper' class='$class'>$ii</a>";
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
