<?php 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This is the template for displaying the theme's search form
	// This search form is displayed when a user clicks the 'click to search' button in the nav-bar
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
?>
<form role="search" method="get" class="search-form lightbox_content" action="http://localhost:8888/lbi/">
	<label>
		<div class="search-title">I would like to find:</div>
		<input type="text" id="focus_field" class="search-field" placeholder="" value="" name="s" autocomplete="off">
	</label>
	<input type="submit" class="search-submit" value="Search" hidden>
	
</form>