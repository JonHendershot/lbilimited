<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lbilimited
 */

?>
<div class="wrapper no-content">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Ahhhh, snap!', 'lbilimited' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lbilimited' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>We couldn't find what you were looking for.. Let's <span class="search_trigger">try again</span></p>

			<?php
				

		else : ?>

			<p>Looks like there's nothing here.. Perhaps if you <span class="search_trigger">search for something</span></p>
		<?php
				

		endif; ?>
	</div><!-- .page-content -->
</div><!-- .wrapper -->