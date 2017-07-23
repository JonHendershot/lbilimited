<?php
	// First, some variables
		$heading        = get_field('title');
		$body           = get_field('content');
		$image          = get_field('photo');
		$orientation    = get_field('orientation');
		$photo_position = get_field('photo_position');	
		$objectClass    = "$orientation sub__heading";
		$imageClass     = "$photo_position pgram__image";
		$btn_text	    = get_field('sb_button_text');
		$btn_link 	    = get_field('sb_button_link');
	
	// Only render the content if the proper information exists
		if($heading && $body) :
?>
	<section class="<?php echo $objectClass; ?>">
		<article>
			<div class="sub__heading-content waypoint" data-padding="100">
				<h2><?php echo $heading; ?></h2>
				<p><?php echo $body; ?></p>
				<?php if($btn_text){
					echo "<a href='$btn_link' data-padding='100' class='main-btn waypoint'>$btn_text</a>";
				}
				?>
			</div>
			<div class="pgram__container waypoint" data-padding="200">
				<div class="pgram__frame">
					<img class="<?php echo $imageClass; ?>" src="<?php echo $image['sizes']['medium_large']; ?>" />
				</div>
			</div>
		</article>
	</section>
<?php endif;