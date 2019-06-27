<?php
  $photos = get_sub_field('photos');
  $heading = ex_heading();
  $content = get_sub_field('content');
  $cta = ex_cta();
  $align = get_sub_field('content_alignment');
  $direction = 'normal';
  if($align == 'left') {
    $direction = 'reverse';
  }
  if($content) {
    echo '<div class="blockphoto-wrap blockphoto-wrap-' . $direction . '">';
      if($photos) {
        echo '<div class="blockphoto-images blockphoto-photo-align-' . $align . ' slider-deco">';
          foreach($photos as $img) {
            echo '<div><div class="blockphoto-image" style="background-image: url(' . $img['sizes']['large'] . ')">' . wp_get_attachment_image($img['id'], 'large') . '</div></div>';
          }
        echo '</div>';
      }
      echo '<div class="blockphoto-content blockphoto-content-align-' . $align . '"><div class="blockphoto-data">';
        echo $heading . $content . $cta;
      echo '</div></div>';
    echo '</div>';
  }
?>
