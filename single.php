<?php
  get_header();
  if(have_posts()):
    while(have_posts()): the_post();
      echo '<section class="module module-heading module-pad-first animate-on-enter is-visible">';
        echo '<header class="blog-header headings">';
          echo '<h1 class="h-color-default h-size-xlarge h-align-center h-deco">' . get_the_title() . '</h1>';
          $cats = get_categories();
          $catList = [];
          if($cats) {
            foreach($cats as $c) {
              $catName = $c->name;
              $catLink = get_category_link($c);
              $cat = '<a href="' . $catLink . '">' . $catName . '</a>';
              array_push($catList, $cat);
            }
          }
          $catHead = implode(', ', $catList);
          echo '<h2 class="h-color-accent h-size-medium h-align-center h-kerning h-lowercase">' . $catHead . '</h2>';
        echo '</header>';
      echo '</section>';

      echo '<section class="module blog-single-wrap">';
        echo '<div class="blog-single-content">';
          echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'aligncenter'));
          the_content();
        echo '</div>';
        get_sidebar('blog');
      echo '</section>';
    endwhile;
  endif;
  get_footer();
?>