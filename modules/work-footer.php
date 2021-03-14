<?php
  $pricing = get_field('pricing_form', getWorkTemplate());
  $pCon = $pricing['content'];
  ex_wrapper('start', 'pricing');
    echo '<div class="pricing-content">';
      if($pCon['heading']) { echo '<h2 class="h-color-default h-kerning h-size-medium h-align-left h-deco h-uppercase h-underline">' . $pCon['heading'] . '</h2>'; }
      if($pCon['sub_heading']) { echo '<h3>' . $pCon['sub_heading'] . '</h3>'; }
      if($pCon['text']) { echo '<p>' . $pCon['text'] . '</p>'; }
      if($pCon['form']) { echo $pCon['form']; }
    echo '</div>';
    echo wp_get_attachment_image($pricing['image']['id'], 'large');
  ex_wrapper('end');
