<?php
  if(have_rows('links')) {
    echo '<nav class="linkblocks-wrap">';
      while(have_rows('links')) {
        the_row();
        $link = get_sub_field('link');
        $img = get_sub_field('background_image');
        $heading = ex_heading();
        echo '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="linkblock" style="background-image: url(' . $img['sizes']['medium'] . ')"><span>' . $heading . '</span></a>';
      }
    echo '</nav>';
  }
?>
