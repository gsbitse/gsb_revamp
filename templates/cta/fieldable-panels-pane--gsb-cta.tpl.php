<?php 

  $style = $variables['field_cta_style'][0]['value'];
  if ( $style == 'cta-red-gradient' ) {
    print '<div class="cta-wrapper separated-box">';
  } else {
    print '<div class="cta-wrapper designed-box">';
  }

  foreach ($variables['field_cta_item'] as $key => $cta_item) {
    $cta_item = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']];

    $title = $cta_item['field_cta_destination'][0]['#markup'];
    $link =  $cta_item['field_cta_destination_link'][0]['#markup'];
	$action =  $cta_item['field_cta_action'][0]['#markup'];
 
  printf('<a href="%s" class="item-%d %s cta-link"><span>%s</span><b>%s</b><i></i></a>', 
      $link,
      $key, 
      $style,
      $action, 
      $title);
  }
  print '</div>';