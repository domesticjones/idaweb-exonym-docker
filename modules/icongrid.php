<?php
  $cols = 100 / get_sub_field('icon_block_columns');
  $height = get_sub_field('icon_height') . 'rem';
  if(have_rows('icons')) {
    echo '<ul class="icongrid-wrap">';
      while(have_rows('icons')) {
        the_row();
        $head = get_sub_field('heading');
        $icon = $head['icon'];
        $heading = $head['heading'];
        $content = get_sub_field('content');
        echo '<li class="icongrid-single" style="width: calc(' . $cols . '% - 2em);">';
          echo '<div class="icongrid-head">';
            echo '<img src="' . $icon['sizes']['medium'] . '" alt="' . $icon['alt'] . '" style="height: ' . $height . '" />';
            echo '<h3>' . $heading . '</h3>';
          echo '</div>';
          echo '<div class="icongrid-content">' . $content . '</div>';
        echo '</li>';
      }
    echo '</ul>';
  }
?>
