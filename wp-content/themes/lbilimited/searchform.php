<?php 
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
	// This is the template for displaying the theme's search form
	// This search form is displayed when a user clicks the 'click to search' button in the nav-bar
	// ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **
?>
<form role="search" method="get" class="search-form" action="http://localhost:8888/lbi/">
	<label>
		<div class="search-title">I would like to find:</div>
		<input type="search" class="search-field" placeholder="" value="" name="s">
	</label>
	<input type="submit" class="search-submit" value="Search" hidden>
	
</form>