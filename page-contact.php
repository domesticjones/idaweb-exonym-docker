<?php
  /* TEMPLATE NAME: Contact */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
			$form = get_field('contact_form');
			if(have_rows('contact_heading')): while(have_rows('contact_heading')): the_row();
      	ex_wrapper('start', 'heading', 'module-pad-first');
					echo ex_heading();
	      ex_wrapper('end');
			endwhile; endif;
			$blurb = get_field('blurb');
			if($blurb) {
				ex_wrapper('start', 'contact-info');
					echo $blurb;
				ex_wrapper('end');
			}
			ex_wrapper('start', 'contact-data');
				echo '<div class="contact-info-left">';
					ex_contact('email');
					ex_contact('address');
				echo '</div>';
				echo '<div class="contact-info-right">';
					ex_contact('phone');
					ex_social();
				echo'</div>';
			ex_wrapper('end');
			if($form) {
				ex_wrapper('start', 'contact-form');
					echo do_shortcode('[contact-form-7 id="' . $form . '"]');
				ex_wrapper('end');
			}
		endwhile; endif;
	get_footer();
?>
