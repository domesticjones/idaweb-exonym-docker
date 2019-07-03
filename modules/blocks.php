<?php
  if(have_rows('blocks')) {
    echo '<ul class="blocks-wrap">';
      while(have_rows('blocks')) {
        the_row();
        $photo = get_sub_field('photo');
        $link = $photo['photo_link'];
        $content = get_sub_field('content');
        echo '<li class="block-single">';
          if($link) { echo '<a href="' . $link['url'] . '" target="' . $link['target'] . '">'; }
          echo '<div class="block-photo" style="background-image: url(' . $photo['image']['sizes']['medium'] . ');">' . wp_get_attachment_image($photo['image']['id'], 'medium');
            if(!empty($photo['text'])) {
              echo '<h2>' . $photo['text'] . '</h2>';
            }
          echo '</div>';
          if($link) { echo '</a>'; }
          echo '<div class="block-content headings"><h3 class="h-underline h-deco h-kerning h-uppercase">' . $content['heading'] . '</h3>' . $content['text'] . '</div>';
        echo '</li>';
      }
    echo '</ul>';
  }
?>
