<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143790355-1"></script>
		<script>
			 window.dataLayer = window.dataLayer || [];
			 function gtag(){dataLayer.push(arguments);}
			 gtag('js', new Date());
			 gtag('config', 'UA-143790355-1');
		</script>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<h1 id="site" class="header-meta"><?php echo get_bloginfo('name'); ?></h1>
		<h2 id="tagline" class="header-meta"><?php echo get_bloginfo('description'); ?></h2>
		<div id="container" class="animate-parallax animate-z-extreme">
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
            'container' => false,
            'theme_location' => 'header-menu',
            'depth' => 1,
          )); ?>
        </nav>
      </header>
