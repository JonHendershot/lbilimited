<?php $project_planner = get_field('option_form_shortcode_1');
	$home_url = home_url(); ?>
<div class="lbi_lightbox consignment_lightbox" data-url="<?php echo $home_url; ?>">
	<div class="contact_form lbi_lightbox contact_lightbox form_consignment form_general-contact lightbox_content">
		<div class="general_contact-container consignment_form ">
			<div class="project-planner-container contact-form-cont contact-project">
				<div class="planner-meta preblur blurtrans">
					<h3 class="form_title">Form Title</h3>
					<div class="section-number">
						<span class="current-field">01</span>
						<span class="total-fields">/ 05</span>
						<div class="current-title">Contact Info</div>
					</div>
				</div>
				<div id="project-planner"><?php echo do_shortcode($project_planner); ?></div>
				<div class="submit-success">
					<img class="success-icon" src="<?php echo get_template_directory_uri(). '/inc/images/icon_confirm.png'; ?>"/>
					<p class="message">Thanks for your information, we'll be in touch shortly!</p>
				</div>
				<div class="btns preblur blurtrans">
					<div class="nav-hint visible">
						Use the [ TAB ] key to navigate the form.
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
	</div>
			<div class="ribbon"></div>
</div>