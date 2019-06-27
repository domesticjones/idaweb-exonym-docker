<?php
  $prepend = get_sub_field('pre_text');
  if(have_rows('rotating_text')) {
    echo '<h1 class="rotatingtext-wrap"><span class="rotatingtext-pre">' . $prepend . ' </span><span class="slider-vertical">';
      while(have_rows('rotating_text')) {
        the_row();
        $text = get_sub_field('text');
        echo '<div>' . $text . '.</div>';
      }
    echo '</span></h1>';
  }
?>
