<?php 

  $variables['field_cta_style'][0]['value'];
  print '<div class="cta-wrapper designed-box">';
  foreach ($variables['field_cta_item'] as $key => $cta_item) {

    $title = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_destination'][0]['#markup'];
    $link = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_destination_link'][0]['#markup'];

	$action = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_action'][0]['#markup'];
  printf('<a href="%s" class="%s cta-link"><span>%s</span><b>%s</b><i></i></a>', 
      $link, 
      $field_cta_style[0]['value'],
      $action, 
      $title);
  }
  print '</div>';