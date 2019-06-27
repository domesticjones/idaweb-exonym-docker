<?php
  $mark = get_sub_field('quotation_mark');
  if(have_rows('testimonials')) {
    echo '<div class="testimonials-wrap slider-testimonials">';
      if($mark) { echo '<h1 class="testimonials-mark"><span>Client Testimonials &amp; Reviews</span></h1>'; }
      while(have_rows('testimonials')) {
        the_row();
        $author = get_sub_field('author');
        $quote = get_sub_field('quote');
        $sep = '';
        if($author['business'] && $author['location']) {
          $sep = ' - ';
        }
        echo '<blockquote class="testimonial"><q>' . $quote . '</q><cite><span class="author">' . $author['name'] . '</span><span class="business">' . $author['business'] . $sep . $author['location'] . '</span></cite></blockquote>';
      }
    echo '</div>';
  }
?>
