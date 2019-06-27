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
						'container' => 'ul',                    // enter '' to remove nav container
						'theme_location' => 'full-menu',		  // where it's located in the theme
						'depth' => 1,							              // limit the depth of the nav
					)); ?>
				</nav>
				<nav class="nav-legal" role="navigation">
					<h3>Legal</h3>
					<?php wp_nav_menu(array(
						'container' => 'ul',                    // enter '' to remove nav container
						'theme_location' => 'legal-menu',		  // where it's located in the theme
						'depth' => 1,							              // limit the depth of the nav
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
					<p id="subscribe-text-error" class="subscribe-text"><?php echo $subscribeText['error']; ?></p>
					<p id="subscribe-text-entice" class="subscribe-text"><?php echo $subscribeText['success']; ?></p>
					<form class="footer-subscribe">
						<input type="email" placeholder="<?php echo $subscribeLabel; ?>">
						<button type="submit" class="cta-button cta-button-solid"><?php echo $subscribeButton; ?></button>
					</form>
				</section>
			</footer>
			<div class="module-bg animate-on-enter" style="background-image: url(<?php ex_logo('alternate', 'light'); ?>);">
				<img src="<?php ex_logo('alternate', 'light'); ?>" alt="<?php ex_brand(); ?> Crystal Emblem" />
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
