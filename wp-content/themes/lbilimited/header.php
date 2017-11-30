<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

// Call global options data and establish variables for the template -- this pulls information from the theme options found in the appearance menu, as established in theme_options.php
	$options = get_option('lbilimited_options');
	
// Let's set some variables up
	$header_class = 'vhfix site-header';
	$post_type = get_post_type();
	$logo = $options['LBI_logo'];
	$loading_icon = $options['loading_img'];
	
	// Setup dynamic page-type class to establish different styles for css
	if( is_single() ){
		$header_type = 'single off timing';
	}else {
		$header_type = 'main';
	}
	$header_class .= " $header_type $post_type";
	
	if( is_front_page() ){
		$hide_header = 'hide_header';
	}else {
		$hide_header = '';
	}

	// Set preview image and meta information variables
	if( get_field('featured_image') ) :
		$og_image_ob = get_field('featured_image');
		$og_image = $og_image_ob['sizes']['large'];


	elseif( get_the_post_thumbnail_url( 'large' ) !== null ) :
		$og_image = get_the_post_thumbnail_url( $post->ID, 'large' );

	else :
		$home_id = get_option('page_on_front');
		$og_image = get_the_post_thumbnail_url( $home_id, 'large' );
		
	endif;

	
// Firs time visitor cookie
	$first_visit = !isset( $_COOKIE["firstVisit"] );
	setCookie( "firstVisit", 1, strtotime('+1 month') );
	
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="<?= $post->post_title; ?>" />
	<meta property="og:url" content="<?= get_the_permalink(); ?>" />
	<meta property="og:image" content="<?= $og_image; ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class( " $hide_header " ); ?>>
	<?php if($first_visit) : ?>
	<div id="pre_loader">
		<div class="ribbon"></div>
		<img src="<?php echo $loading_icon; ?>" />
	</div>
	<?php endif; ?>
	<div id="page" class="site">		
		<header id="masthead" class="<?php echo $header_class; ?>" role="banner">
			<!-- Fixed nav bar across the top of each page -->
			<div class="nav-wrapper">
				<div class="nav-bar">
					<a href="<?php echo home_url(); ?>" class="header-logo">
						<img src="<?php echo $logo; ?>" class="main-logo" />
					</a>
					<?php if( is_single() && get_post_type() == 'offerings' ){
						$year = get_field('year');
						$make = get_field('make');
						$model = get_field('model');
						$title = get_the_title();
						$price = get_offering_price();
						
						echo "<div class='header_meta'>";
						if( $year && $make ){
							echo "<p class='title'>$year $make $model</p>";
						}else {
							echo "<p class='title'>$title</p>";
						}
						echo "<p class='price'>
								<span class='p_ribbon'></span>
								<span class='p_price'>$price</span>
							  </p>";
								
						
								
						echo "</div>";
					}
					?>
					<div class="search_menu_container">
						<p class="search search_trigger header s_btn white">Click to search</p>
						<div class="menu_trigger s_btn white">
							<span class="text_trigger">Menu</span>
							<span class="mobile_trigger_wrapper">
								<span class="line_1 menu_line"></span>
								<span class="line_2 menu_line"></span>
								<span class="line_3 menu_line"></span>
								<span class="line_4 menu_line"></span>
							</span>
						</div>
					</div>
				</div>
				<?php get_template_part('template-parts/module', 'main_menu'); ?>

				<!-- Lightboxes-->
				<?php get_template_part('template-parts/module', 'lightboxes'); ?>
			</div>
			<?php
				// We have a couple different options for framing the header content, so we'll use the previously generated $post_type variable to call the appropriate page header content
					get_template_part('template-parts/header', 'main');
				
			?>
			
		</header><!-- #masthead -->
	
		<div id="content" class="site-content <?php echo "$post_type"; ?>">
