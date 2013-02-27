<?php 
  print sprintf('<div class="%s">', $field_cta_style[0]['value']);
  if ($field_cta_title[0]['value']) {
    print '<div class="title">' . $field_cta_title[0]['value'] . '</div>';
  } 
  if ($field_cta_description[0]['safe_value']) {
    print '<div class="description">' . $field_cta_description[0]['safe_value'] . '</div>';
  }
  print sprintf('<div class="cta-link"><a href="%s">%s</a></div>', $field_cta_link[0]['url'], $field_cta_link[0]['title']);

  print '</div>';