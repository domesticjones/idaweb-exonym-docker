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
  $colWidth = get_sub_field('width');
  if($photos || $content || $heading || $cta) {
    echo '<div class="twocolumn-wrap twocolumn-wrap-' . $direction . '">';
      if($photos) {
        echo '<div class="twocolumn-photos slider-deco" style="width: ' . $colWidth['photo_column'] . '%">';
          foreach($photos as $img) {
            echo '<div><div class="twocolumn-photo" style="background-image: url(' . $img['sizes']['medium'] . ')">' . wp_get_attachment_image($img['id'], 'medium') . '</div></div>';
          }
        echo '</div>';
      }
      echo '<div class="twocolumn-content" style="width: ' . $colWidth['content_column'] . '%;">';
        echo $heading . $content . $cta;
      echo '</div>';
    echo '</div>';
  }
?>
