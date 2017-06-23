<?php
	
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This template will be used to display only the loop for LBI News (posts) archive 
	// The loop has already been initiated in index.php, where this file is called, so the 
	// 		content in this file will run once per post-number
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	
	// Variables
		$title = get_the_title();
		$options = get_option('lbilimited_options');
		$feat_img = get_field('featured_image'); // we're using a custom field for the featured image so that we can have the featured image and image framing options in the same place in the dashboard. Thus, we'll call the featured image like this rather than using the_post_featured_image_url();
		if($feat_img){
			$feat_img_url = $feat_img['url'];
		}else {
			$feat_img_url = $options['blog_img'];
		}
		if( get_field('framing') ){
			$framing = get_field('framing');
		}else {
			$framing = 'center';
		}
		$date = get_the_date();
		$link = get_the_permalink();
		
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-post' ); ?>>
	<a href="<?php the_permalink(); ?>" class="post-link">
		<div class="post-content">
			<div class="post-title dash-title">
				<h2><?php echo $title; ?></h2>
			</div>
			<div class="post-meta">
				<div class="date"><?php echo $date; ?></div>
				<span class="expand">Read more</span>
			</div>
		</div>
		<div class="post-image">
			<?php echo "<img src='$feat_img_url' class='$framing' />"; ?>
		</div>
	</a>
</article><!-- #post-## -->

