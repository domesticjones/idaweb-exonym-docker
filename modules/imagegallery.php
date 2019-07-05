<?php
  $images = get_sub_field('images');
  $count = 100 / get_sub_field('photo_row_count');
  if($images) {
    echo '<ul class="gallery-wrap">';
      foreach($images as $img) {
        echo '<li class="gallery-image" style="width: calc(' . $count . '% - 1em);">';
          echo '<div class="gallery-thumb" style="background-image: url(' . $img['sizes']['thumbnail-large'] . ')"></div>';
          echo wp_get_attachment_image($img['id'], 'large');
          if(!empty($img['caption'])) { echo '<div class="gallery-caption">' . $img['caption'] . '</div>'; }
        echo '</li>';
      }
    echo '</ul>';
  }
?>
