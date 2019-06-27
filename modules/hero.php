<?php
  $content = get_sub_field('content');
  $arrow = get_sub_field('down_arrow');
  if(have_rows('images')) {
    while(have_rows('images')){
      the_row();
      $tagline = get_sub_field('tagline');
      $image = get_sub_field('image');
    }
  }
?>
