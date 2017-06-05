<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __replace_this_theme_name__
 */

$post_type = get_post_type();
$display_posts = array(
	'offerings',
	'collection',
	'post'
);

if(in_array($post_type, $display_posts)) :
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article_image">
		<?php
			
			$featured_media_file = get_field('featured_image');
		
			if(has_post_thumbnail()){
				$img_src = get_the_post_thumbnail_url($post->ID,'medium_large'); 
			}else if($featured_media_file){
				$img_src = $featured_media_file['sizes']['medium_large'];
				
			}else {
				$img_src = '';
			}
			
			echo "<img src='$img_src' class='object-fit' />";
		
		?>
	</div>
	<div class="article_content">
		<header class="entry-header">
			<?php 
				
				$title_raw = get_the_title();
				$link = get_the_permalink();
				
				if(strlen($title_raw) <= 30){
					$title = $title_raw;
				}else {
					$title = substr($title_raw,0,30). '...';
				}
				
				echo "<h2 class='entry-title'><a href='$link' rel='bookmark'>$title</a></h2>";
				 
				
				if($post_type == 'offerings'){
					if( in_category('current-offerings') ){
						$cat_title = 'Current Offerings';
						$cat_uri = 'current-offerings';
					}else if( in_category('past-offerings') ){
						$cat_title = 'Past Offerings';
						$cat_url = 'past-offerings';
					}
				}else if($post_type == 'collection'){
					$cat_title = 'LBI Collection';
					$cat_uri = 'lbi-collection';
				}else if($post_type == 'post'){
					$cat_title = 'Recent News';
					$cat_uri = 'in-the-news';
				}
				$cat_url = home_url() . "/$cat_uri";
				
				echo "<a href='$cat_url' class='post_archive_link'>$cat_title</a>";
				
			?>
				
		</header><!-- .entry-header -->
	
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="main-btn">Read More</a>
		</div><!-- .entry-summary -->
	</div>
	
</article><!-- #post-## -->

<?php endif;
