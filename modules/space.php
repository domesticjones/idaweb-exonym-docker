<?php
  $d = get_sub_field('space')['desktop'];
  $w = get_sub_field('space')['tablet_wide'];
  $t = get_sub_field('space')['tablet'];
  $m = get_sub_field('space')['mobile'];

  echo '<hr class="space space-desktop" style="height: ' . $d['height'] . $d['unit'] . '" />';
  echo '<hr class="space space-wide" style="height: ' . $w['height'] . $w['unit'] . '" />';
  echo '<hr class="space space-tablet" style="height: ' . $t['height'] . $t['unit'] . '" />';
  echo '<hr class="space space-mobile" style="height: ' . $m['height'] . $m['unit'] . '" />';
?>

