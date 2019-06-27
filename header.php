<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<h1 id="site" class="header-meta"><?php echo get_bloginfo('name'); ?></h1>
		<h2 id="tagline" class="header-meta"><?php echo get_bloginfo('description'); ?></h2>
		<div id="container" class="animate-parallax animate-z-extreme">
			<div class="module-bg animate-on-enter" style="background-image: url(<?php ex_logo('alternate', 'dark'); ?>);">
				<img src="<?php ex_logo('alternate', 'dark'); ?>" alt="<?php ex_brand(); ?> Crystal Emblem" />
			</div>
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <a href="<?php echo get_home_url(); ?>">
					<img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" class="logo-header" />
				</a>
				<a href="#" id="responsive-nav-toggle">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
				</a>
        <nav id="nav-header" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
          <?php wp_nav_menu(array(
            'container' => false,								// remove nav container
            'container_class' => '',						// class of container (should you choose to use it)
            'menu' => __('Header', 'exonym'),	  // nav name
            'menu_class' => '',									// adding custom nav class
            'theme_location' => 'header-menu',	// where it's located in the theme
            'before' => '',											// before the menu
            'after' => '',											// after the menu
            'link_before' => '',								// before each link
            'link_after' => '',									// after each link
            'depth' => 0,												// limit the depth of the nav
            'fallback_cb' => ''									// fallback function (if there is one)
          )); ?>
        </nav>
      </header>
