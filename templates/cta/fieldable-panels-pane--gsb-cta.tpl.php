<?php 
  if (!empty($field_cta_link[0]['title'])) {
    $title = isset($field_cta_title) ? sprintf('<span class="cta-title">%s</span>', $field_cta_title[0]['value']) : '';

    printf('<a href="%s" class="designed-box %s cta-link">%s<b>%s</b><i></i></a>', 
      $field_cta_link[0]['url'], 
      $field_cta_style[0]['value'],
      $title, 
      $field_cta_link[0]['title']);
  }


