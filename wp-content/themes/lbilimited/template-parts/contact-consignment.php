<?php
	// Let's grab some variables for the page first
		// Page Options
			$form_array = array();
			$project_planner = get_field('option_form_shortcode_1');

?>
	
	
<section class="form_selection_container">
	<div class="form_selection_wrapper">
		<?php
			
			for($ii = 1; $ii <= 2; $ii++){
				// Variables
					$form_title = get_field("option_title_$ii");
					$form_content = get_field("option_description_$ii");
					$form_shortcode = get_field("option_form_shortcode_$ii");
					
				// Update $form_array
					$form_array[] = array(
						'title' => 'general_contact',
						'shortcode' => $form_shortcode
					);
					
				// Output
				echo "<div class='option_$ii form_option'>
						<h2 class='option_title'>$form_title</h2>
						<p class='option_description'>$form_content</p>
						<div class='option_form_trigger' data-form-id='form-$ii'>Launch Form</div>
					  </div>";
			}	
		
		?>
	</div>

</section>

<?php
	// Build an array for the form information and
	// Call the custom function from functions.php to build the contact form section	
// 		lbi_contact($form_array, 'consignment');