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
	
	
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="pre_loader">
		<div class="ribbon"></div>
		<img src="<?php echo $loading_icon; ?>" />
	</div>
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
						echo "<p class='price'>$price</p>";
						
								
						echo "</div>";
					}
					?>
					<div class="search_menu_container">
						<p class="search search_trigger header">Click to search</p>
						<div class="menu_trigger">
							<div class="dot-container">
								<?php for($i = 1; $i <= 9; $i++){
									echo "<span class='menu-dot'></span>"; 
								} ?>
							</div>
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
