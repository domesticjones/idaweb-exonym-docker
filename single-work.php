<?php
  get_header();
    if(have_posts()): while(have_posts()): the_post();
      $title = get_the_title();
      $links = get_field('links');
      $about = get_field('about');
      $quote = get_field('quote');
      $tags = get_the_tags($post->ID);
      $media = get_field('highlights');
      $mediaHeading = get_field('highlights_heading');
      get_template_part('modules/work', 'header');
      ex_wrapper('start', 'work-details');
        the_post_thumbnail('large');
        echo '<div class="work-details-info">';
          echo '<h1 class="h-color-default h-size-medium h-align-left h-kerning h-deco h-uppercase h-underline">' . $title . '</h1>';
          if($about) { the_field('about'); }
          if($links) {
            echo '<nav class="work-details-links">';
              foreach($links as $l) {
                echo '<a href="' . $l['link']['url'] . '" target="' . $l['link']['target'] . '" class="cta-button cta-button-solid">' . $l['link']['title'] . '</a>';
              }
            echo '</nav>';
          }
          if($quote['text']) {
            echo '<h2 class="work-quote-heading">What the Client Said</h2>';
            $qImage = $quote['handwritten'];
            echo '<blockquote>';
              echo '<div class="work-quote-written">' . ($qImage ? wp_get_attachment_image($qImage['ID'], 'large') : '') . '</div>';
              echo '<q>' . $quote['text'] . '</q>';
              if($quote['name'] || $quote['title']) {
                echo '<cite>&horbar; ' . ($quote['name'] ? $quote['name'] . ', ': '') . ($quote['title'] ? $quote['title'] . ' of ': '') . get_the_title($post->ID) . '</cite>';
              }
            echo '</blockquote>';
          }
          if($tags && !is_wp_error($tags)) {
            echo '<h3 class="work-tags-heading">Deliverables</h3>';
            echo '<ul class="work-tags">';
              foreach($tags as $t) {
                echo '<li>' . $t->name . '</li>';
              }
            echo '</ul>';
          }
        echo '</div>';
      ex_wrapper('end');
      if($media) {
        ex_wrapper('start', 'work-media');
          if($mediaHeading) { echo '<h2 class="work-media-heading h-color-default h-size-small h-align-center h-kerning h-deco h-uppercase h-underline h-overline">' . $mediaHeading . '</h2>'; }
          echo '<nav class="module-work-wrap">';
            foreach($media as $m) {
              echo '<a href="' . $m['sizes']['large'] . '" class="gallery-image work-single">';
                echo '<div class="work-bg" style="background-image: url(' . $m['sizes']['medium'] . ')">' . wp_get_attachment_image($m['id'], 'large') . '</div>';
                if(!empty($m['caption'])) { echo '<h2 class="gallery-caption">' . $m['caption'] . '</h2>'; }
              echo '</a>';
            }
          echo '</nav>';
        ex_wrapper('end');
      }
      get_template_part('modules/work', 'footer');
    endwhile; endif;
  get_footer();
?>
