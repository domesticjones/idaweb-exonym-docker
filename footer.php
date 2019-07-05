			<?php
				$footerForm = get_field('contact_form', 'options');
				if($footerForm && is_page_template() != 'page-contact.php') {
					$footerFormBg = get_field('contact_form_photo', 'options');
					echo '<footer id="footer-form" class="module" style="background-image: url(' . $footerFormBg['sizes']['jumbo'] . ')"><div class="footer-form-inner">';
						if(have_rows('contact_form_heading', 'options')) {
							while(have_rows('contact_form_heading', 'options')) {
								the_row();
								echo ex_heading();
								echo do_shortcode('[contact-form-7 id="' . $footerForm . '"]');
							}
						}
					echo '</div></footer>';
				}
			?>
			<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<section class="nav-contact">
					<h3>Contact Us</h3>
					<?php ex_contact('phone', true, 'global'); ex_contact('email', true, 'global'); ?>
					<ul class="cta-row">
						<li class="cta-single">
							<a href="#schedule" target="" class="cta-button cta-button-ghost">Schedule a Consultation</a>
						</li>
					</ul>
				</section>
				<nav class="nav-full" role="navigation">
					<h3>Navigation</h3>
					<?php wp_nav_menu(array(
						'container' => 'ul',
						'theme_location' => 'full-menu',
						'depth' => 1,
					)); ?>
				</nav>
				<nav class="nav-legal" role="navigation">
					<h3>Legal</h3>
					<?php wp_nav_menu(array(
						'container' => 'ul',
						'theme_location' => 'legal-menu',
						'depth' => 1,
					)); ?>
					<p class="copyright">&copy; <?php ex_brand('legal'); ?>, <?php echo date('Y'); ?></p>
				</nav>
				<section class="nav-follow">
					<h3>Follow Us</h3>
					<?php ex_social(); ?>
				</section>
				<section class="nav-subscribe">
					<h3>Subscribe</h3>
					<?php
						$subscribeText = get_field('subscribe_text', 'options');
						$subscribeLabel = get_field('subscribe_email_label', 'options');
						$subscribeButton = get_field('subscribe_button_text', 'options');
					?>
					<p id="subscribe-text-entice" class="subscribe-text"><?php echo $subscribeText['entice']; ?></p>
					<p id="subscribe-text-error" class="subscribe-text"><?php echo $subscribeText['error']; ?><span></span></p>
					<p id="subscribe-text-success" class="subscribe-text"><?php echo $subscribeText['success']; ?></p>
					<form action="https://idahowebsites.us3.list-manage.com/subscribe/post-json?u=d7300d8f59a3e9a226106e843&amp;id=ecaa785fb9&c=?" method="get" id="subscribe-form" class="footer-subscribe">
						<input type="email" name="EMAIL" placeholder="<?php echo $subscribeLabel; ?>">
					  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d7300d8f59a3e9a226106e843_ecaa785fb9" tabindex="-1" value=""></div>
						<button type="submit" class="cta-button cta-button-solid"><?php echo $subscribeButton; ?></button>
					</form>
				</section>
			</footer>
			<div class="module-bg animate-on-enter" style="background-image: url(<?php ex_logo('alternate', 'light'); ?>);">
				<img src="<?php ex_logo('alternate', 'light'); ?>" alt="<?php ex_brand(); ?> Crystal Emblem" />
			</div>
		</div>
		<div id="modal-funnel" class="modal-parent">
			<div class="modal-matte"></div>
			<div class="modal-inner">
				<div class="modal-close"></div>
				<div id="funnel-step-first" class="funnel-step is-active">
					<?php
						$scheduleForm = get_field('schedule_form', 'options');
						$scheduleDataContent = get_field('schedule_data_content', 'options');
						if(have_rows('schedule_data_heading', 'options')) {
							while(have_rows('schedule_data_heading', 'options')) {
								the_row();
								echo ex_heading();
							}
						}
						if($scheduleDataContent) { echo '<p class="funnel-step-text">' . $scheduleDataContent . '</p>'; }
						echo do_shortcode('[contact-form-7 id="' . $scheduleForm . '"]')
					?>
				</div>
				<div id="funnel-step-second" class="funnel-step">
					<?php the_field('schedule_calendar_code', 'options'); ?>
				</div>
			</div>
		</div>
		<div id="modal-photo" class="modal-parent">
			<div class="modal-matte"></div>
			<div class="modal-inner"><div class="modal-close"></div><div class="modal-content"></div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
