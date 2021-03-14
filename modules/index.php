<?php
function ex_content() {
  if(have_rows('content_module')) {
    while(have_rows('content_module')) {
      the_row();
      ex_wrapper('start');
        if(get_row_layout() =='blocks') {
          get_template_part('modules/blocks');
        } elseif(get_row_layout() =='block_photo') {
          get_template_part('modules/blockphoto');
        } elseif(get_row_layout() =='blog_posts') {
          get_template_part('modules/blogposts');
        } elseif(get_row_layout() =='full_width') {
          get_template_part('modules/fullwidth');
        } elseif(get_row_layout() =='heading') {
          get_template_part('modules/heading');
        } elseif(get_row_layout() =='hero_image') {
          get_template_part('modules/hero');
        } elseif(get_row_layout() =='icon_grid') {
          get_template_part('modules/icongrid');
        } elseif(get_row_layout() =='image_gallery') {
          get_template_part('modules/imagegallery');
        } elseif(get_row_layout() =='link_blocks') {
          get_template_part('modules/linkblocks');
        } elseif(get_row_layout() =='rotating_text') {
          get_template_part('modules/rotatingtext');
        } elseif(get_row_layout() =='space') {
          get_template_part('modules/space');
        } elseif(get_row_layout() =='team') {
          get_template_part('modules/team');
        } elseif(get_row_layout() =='testimonials') {
          get_template_part('modules/testimonials');
        } elseif(get_row_layout() =='two_column') {
          get_template_part('modules/twocolumn');
        }
      ex_wrapper('end');
    }
  }
}

function ex_wrapper($pos, $name = '', $classes = '') {
  if(empty($name)) {
    $name = get_row_layout();
  }
  if($pos == 'start') {
    $id = get_sub_field('module_id');
    $pad = get_sub_field('module_padding');
    echo '<section id="' . $id . '" class="module module-' . $name . ' module-pad-' . $pad . ' animate-on-enter ' . $classes . '">';
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
  $i = 0;
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
