<?php
  /* TEMPLATE NAME: Contact */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
      echo 'contact';
		endwhile; endif;
	get_footer();
?>
