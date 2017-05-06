<?php
	// First, some variables
	$heading        = get_field('title');
	$body           = get_field('content');
	$image          = get_field('photo');
	$orientation    = get_field('orientation');
	$photo_position = get_field('photo_position');	
	$objectClass    = "$orientation sub__heading";
	$imageClass     = "$photo_position pgram__image";

?>
<section class="<?php echo $objectClass; ?>">
	<article>
		<div class="sub__heading-content">
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $body; ?></p>
		</div>
		<div class="pgram__container">
			<div class="pgram__frame"><!-- styled in _subheading.scss // add an orientation to this element to allow for dynamic framing on the images -->
				<img class="<?php echo $imageClass; ?>" src="<?php echo $image['url']; ?>" />
				
			</div>
		</div>
	</article>
</section>