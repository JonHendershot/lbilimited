<?php
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display the LBI Blog and Collection Single post content 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **

get_header(); 
wp_reset_query();?>

<section <?php post_class('post_wrapper'); ?>>
	<?php 		get_template_part('template-parts/module', 'media_lightbox');
?>
	<article class="post_content">
		<?php 
			// If the post has an excerpt, output it here
			$excerpt = get_the_excerpt();
			if($excerpt){
				echo "<h3 class='post_excerpt'>$excerpt</h3>";
			}
			// Output the post content
			the_content(); 
			get_template_part('template-parts/module', 'post_navigator')?>
	</article>
</section>

<?php
get_footer();
