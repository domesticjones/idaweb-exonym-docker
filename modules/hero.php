<?php
  $content = get_sub_field('content');
  $cta = ex_cta();
  $arrow = get_sub_field('down_arrow');
  if(have_rows('images')) {
    echo '<div class="hero-slides slider-deco">';
    while(have_rows('images')){
      the_row();
      $tagline = get_sub_field('tagline');
      $image = get_sub_field('image');
      echo '<div>';
        echo '<div class="hero-photo" style="background-image: url(' . $image['sizes']['large'] . ')">' . wp_get_attachment_image($image['id'], 'large') . '</div>';
        echo '<div class="hero-tag">' . wp_get_attachment_image($tagline['id'], 'large') . '</div>';
      echo '</div>';
    }
    echo '</div>';
    if(!empty($content) || !empty($cta)) {
      echo '<div class="hero-content">' . $content . $cta . '</div>';
    }
    if($arrow) {
      echo '<a href="#down" class="hero-next"><span>Go Down</span></a>';
    }
  }
?>
