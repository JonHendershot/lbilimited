<?php
	
	// Get the menu items array for the main menu
	$menu_items = wp_get_nav_menu_items('Main Menu');
/*
	echo "<pre>";
		print_r($menu_items);
	echo "</pre>";
*/
	echo "<div id='main_menu' class=''>";

	foreach($menu_items as $key=>$item){
		// Variables
			$title = $item->title;
			$url = $item->url;
			$page_ID = $item->object_id;
			$menu_image = get_field('menu_photo', $page_ID);
			
			if($menu_image){
				$image = $menu_image['sizes']['medium_large'];
			}else {
				$image = get_the_post_thumbnail_url($page_ID, 'medium_large');
			}
			
			$display_title = span_per_word_title( $title, 3 );
	
		// We need to wrap every 3 elements in a section wrapper
		if( ($key + 3) % 3 == 0){
			$section_id = ($key + 3) / 3;
			
			echo "<div class='menu_section section_$section_id'>
					<div class='menu_items_wrapper'>";
		}
			echo "<a href='$url'>
				  	<div class='item-$key menu_title dash-title'>$display_title</div>
				  	<div class='image_wrapper'>
				  		<img data-src='$image' src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' class='object-fit lazy-load' />
				  	</div>
				  </a>";
			
		
		// If we wrapped this row, we need to close it up
		if( ($key + 3) % 3 == 2) {
			
			echo "</div></div>"; // .menu_items_wrapper .menu_section
		}
		
	}
	
	echo "</div>"; // #main_menu
