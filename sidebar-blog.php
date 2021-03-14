<?php
  echo '<aside class="sidebar blog-single-sidebar">';
    echo '<div class="widget widget-author">';
      echo '<h3 class="widget-title">About the Author</h3>';
      $authorName = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
      $authorBio = get_the_author_meta('description');
      $authorId = get_the_author_meta('id');
      echo '<div class="sidebar-author-image">' . get_avatar($authorId) . '</div>';
      echo '<h4>' . $authorName . '</h4><p>' . $authorBio . '</p>';
    echo '</div>';
    echo '<div class="widget widget-emaillist">';
      echo '<h3 class="widget-title">Join the List</h3>';
      echo '<script async data-uid="365ce8df5f" src="https://awesome-originator-1905.ck.page/365ce8df5f/index.js"></script>';
    echo '</div>';
    echo '<div class="widget widget-emaillist">';
      echo '<h3 class="widget-title">Share This</h3>';
      $pageTitle = get_the_title($post->ID);
      $pageUrl = get_the_permalink($post->ID);
      echo do_shortcode('[addtoany url="' . $pageUrl . '" title="' . $pageTitle . ' - from Idaho Websites"]');
    echo '</div>';
  echo '</aside>';
?>