<?php
function ex_content() {
  if(have_rows('content_module')) {
    while(have_rows('content_module')) {
      the_row();
      if(get_row_layout() =='blocks') {
        echo 'Blocks!';
      } elseif(get_row_layout() =='block_photo') {
        ex_wrapper('start');
          get_template_part('modules/blockphoto');
        ex_wrapper('end');
      } elseif(get_row_layout() =='heading') {
        echo 'Heading!';
      } elseif(get_row_layout() =='hero_image') {
        ex_wrapper('start');
          get_template_part('modules/hero');
        ex_wrapper('end');
      } elseif(get_row_layout() =='link_blocks') {
        ex_wrapper('start');
          get_template_part('modules/linkblocks');
        ex_wrapper('end');
      } elseif(get_row_layout() =='testimonials') {
        echo 'Testimonials!';
      } elseif(get_row_layout() =='two_column') {
        echo 'Two Column!';
      }
    }
  }
}

function ex_wrapper($pos) {
  if($pos == 'start') {
    $id = get_sub_field('module_id');
    echo '<section id="' . $id . '" class="module module-' . get_row_layout() . ' animate-on-enter">';
  } elseif($pos == 'end') {
    echo '</section>';
  }
}

function ex_cta() {
  $output = '';
  if(have_rows('call_to_actions')) {
    $output .= '<ul class="cta-row">';
    while(have_rows('call_to_actions')) {
      the_row();
      $link = get_sub_field('link');
      $type = get_sub_field('type');
      $output .= '<li class="cta-single">';
        $output .= '<a href="' . $link['url'] . '" target="' . $link['target'] . '" class="cta-button cta-button-' . $type . '">' . $link['title'] . '</a>';
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  return $output;
}

function ex_heading() {
  $output = '';
  $i = 1;
  if(have_rows('headings')) {
    $output .= '<header class="headings">';
    while(have_rows('headings')) {
      the_row();
      $i++;
      $text = get_sub_field('text');
      $options = get_sub_field('options');
      $attrs = $options['attributes'];
      foreach($attrs as &$v) {
        $v = 'h-' . $v;
      }
      $class = 'h-color-' .  $options['color'] . ' h-size-' . $options['size'] . ' h-align-' . $options['align'] . ' ' . implode(' ', $attrs);
      $output .= '<h' . $i . ' class="' . $class . '">' . $text . '</h' . $i . '>';
    }
    $output .= '</header>';
  }
  return $output;
}
?>
