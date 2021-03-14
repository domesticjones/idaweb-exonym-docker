<?php
  $params = get_sub_field('blog_posts');
  $count = $params['how_many'];
  $sort = $params['freshness'];
  $cat = $params['category'];

  $args = array(
  	'post_type'       => array('post'),
  	'posts_per_page'  => $count,
  	'orderby'         => $sort,
  	'cat'             => $cat
  );
  $module_blog = new WP_Query( $args );
  if ( $module_blog->have_posts() ) {
    echo '<div class="module-blog-wrap">';
      while ( $module_blog->have_posts() ) {
        $module_blog->the_post();
        get_template_part('modules/post-blog');
      }
  	echo '</div>';
  }
  wp_reset_postdata();
?>