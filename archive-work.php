<?php
  /* TEMPLATE NAME: Work */
  get_header();
  get_template_part('modules/work', 'header');
  $workList = get_field('arrange');
  if($workList) {
    ex_wrapper('start', 'work');
      echo '<nav class="module-work-wrap">';
        foreach($workList as $w) {
          $id = $w->ID;
          $imgUrl = get_the_post_thumbnail_url($id, 'medium');
          $imgFull = get_the_post_thumbnail($id, 'medium');
          echo '<a href="' . get_the_permalink($id) . '" class="work-single">';
            echo '<div class="work-bg" style="background-image: url(' . $imgUrl . ')">' . $imgFull . '</div>';
            echo '<h2>' . get_the_title($id) . '</h2>';
          echo '</a>';
        }
      echo '</nav>';
    ex_wrapper('end');
    get_template_part('modules/work', 'footer');
  }
  get_footer();
?>
