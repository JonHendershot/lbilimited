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
<section class="contact_form form_consignment form_general-contact">
	<h4 class="tilt_title">Drop A Line</h4>
	<div class="general_contact-container consignment_form">
		<div class="project-planner-container contact-form-cont contact-project">
			<div class="planner-meta preblur blurtrans">
				<div class="section-number">
					
					<span class="current-field">01</span>
					<span class="total-fields">/ 05</span>
				</div>
				<div class="current-title">
					Contact Information
				</div>
			</div>
			<div id="project-planner"><?php echo do_shortcode($project_planner); ?></div>
			<div class="submit-success">
				<img class="success-icon" src="<?php echo get_template_directory_uri(). '/inc/images/icon_confirm.png'; ?>"/>
				<p class="message">Thanks for your information, we'll be in touch shortly!</p>
			</div>
			<div class="btns preblur blurtrans">
				<div class="nav-hint visible">
					Press [ SHIFT ] + [ LEFT ] & [ RIGHT ] arrow keys or click to continue
				</div>
				<div class="main-btn prev-field orange hidden">
					<span>previous</span>
				</div>
				<div class="main-btn next-field orange">
					<span>next</span>
				</div>
				<div class="main-btn orange submit hidden" onClick="jQuery(document.forms['consignment']).trigger('submit')">
					<span>Submit</span>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	// Build an array for the form information and
	// Call the custom function from functions.php to build the contact form section	
// 		lbi_contact($form_array, 'consignment');