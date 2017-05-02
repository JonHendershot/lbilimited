<?php
	// First, some variables
	$heading     = get_field('title');
	$body        = get_field('content');
	$image       = get_field('photo');
	$orientation = get_field('orientation');
	$objectClass = "$orientation sub__heading";	

?>
<section class="<?php echo $objectClass; ?>">
	<article>
		<div class="sub__heading-content">
			<h2><?php echo $heading; ?></h2>
			<p><?php echo $body; ?></p>
		</div>
		<div class="pgram__container">
			<div class="pgram__frame"><!-- styled in _subheading.scss // add an orientation to this element to allow for dynamic framing on the images -->
				<div class="pgram__image" style="background-image:url(<?php echo $image['url']; ?>)">
				</div>
			</div>
		</div>
	</article>
</section>