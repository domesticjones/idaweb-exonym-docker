<?php
  $team = get_sub_field('team');
  $heading = ex_heading();
  $content = get_sub_field('content');
  $cta = ex_cta();
  echo '<div class="team-wrap">';
    echo '<div class="team-content">';
      echo $heading . $content . $cta;
      if($team) {
        echo '<ul class="team-members">';
          foreach($team as $t) {
            $photo = wp_get_attachment_image($t['photo']['ID'], 'thumbnail-large');
            $name = $t['info']['name'];
            $title = $t['info']['title'];
            $titleFun = $t['info']['fun_title'];
            $bio = $t['info']['bio'];
            $qa = $t['info']['qa'];
            echo '<li class="team-member">';
              echo $photo;
              echo '<h2 class="name">' . $name . '<span>' . $title . '</span></h2>';
              echo '<div class="team-member-content">';
                echo '<div class="team-member-head">';
                  echo '<div class="team-member-photo">';
                    echo $photo;
                  echo '</div>';
                  echo '<div class="team-member-data">';
                    echo '<h2>' . $name . '</h2>';
                    echo '<h3>' . $title . '<br />' . $titleFun . '</h3>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="team-member-text">';
                  if($qa) {
                    echo '<ul class="team-member-qa">';
                      foreach($qa as $q) {
                        echo '<li><p>Q: ' . $q['question'] . '<br />A: ' . $q['answer'] . '</p></li>';
                      }
                    echo '</ul>';
                  }
                  echo '<div class="team-member-bio">';
                    echo '<p>' . $bio . '</p>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</li>';
          }
        echo '</ul>';
      }
    echo '</div>';
  echo '</div>';
?>
