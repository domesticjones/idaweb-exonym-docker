<?php
  $blog = get_option('page_for_posts');
  $hero = get_field('hero_image', $blog);
  $title = get_field('blog_title', $blog);
  $desc = get_field('blog_description', $blog);
	get_header();
		if(have_posts()):
      if($hero || $title || $desc) {
        ex_wrapper('start', 'blog-hero');
          if($hero) { echo '<div class="blog-hero-background" style="background-image: url(' . $hero['sizes']['jumbo'] . ');"><span>' . $hero['title'] . '</span></div>'; }
          if($title || $desc) {
            echo '<div class="blog-hero-content">';
              if($title) { echo '<h1>' . $title . '</h1>'; }
              if($desc) { echo '<p>' . $desc . '</p>'; }
            echo '</div>';
          }
        ex_wrapper('end');
      }
      echo '<nav class="module module-blog-nav">';
        wp_nav_menu(array(
          'container' => false,
          'theme_location' => 'blog-menu',
          'depth' => 1,
        ));
      echo '</nav>';
      ex_wrapper('start', 'blog-wrap');
        while(have_posts()): the_post();
          $thumb = get_the_post_thumbnail_url($post->ID, 'medium');
          $thumbHidden = get_the_post_thumbnail($post->ID, 'medium');
          $thumbClass = '';
          if($thumb) {
            $thumbClass = ' blog-thumb-present';
          }
          echo '<article id="post-' . get_the_ID() . '" class="' . implode(' ', get_post_class()) . '">';
            echo '<a href="' . get_the_permalink() . '" class="blog-thumb' . $thumbClass . '" title="Read More about ' . get_the_title() . '" style="background-image: url(' . $thumb . ')">' . $thumbHidden . '</a>';
            echo '<div class="blog-preview">';
              echo '<h2>' . get_the_title() . '</h2>';
              echo '<p>' . ex_excerpt(strip_tags(get_the_content())) . '</p>';
              echo '<a href="' . get_the_permalink() . '" class="cta-button cta-button-ghost">Read more</a>';
            echo '</div>';
          echo '</article>';
    		endwhile;
      ex_wrapper('end');
      echo '<aside class="blog-sidebar">';
        get_template_part('modules/sidebar', 'cats');
      echo '</aside>';
    endif;
	get_footer();
?>
