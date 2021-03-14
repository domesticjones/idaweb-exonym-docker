<?php
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
?>