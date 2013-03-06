<?php 


  echo $variables['field_cta_style'][0]['value'];

  foreach ($variables['field_cta_item'] as $key => $cta_item) {

    $title = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_destination'][0]['#markup'];
    $link = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_destination_link'][0]['#markup'];

	$action = $variables['elements']['field_cta_item'][$key]['entity']['field_collection_item'][$cta_item['value']]['field_cta_action'][0]['#markup'];
  }

/*
    $title = isset($field_cta_title) ? sprintf('<span class="cta-title">%s</span>', $field_cta_title[0]['value']) : '';

    printf('<a href="%s" class="designed-box %s cta-link">%s<b>%s</b><i></i></a>', 
      $field_cta_link[0]['url'], 
      $field_cta_style[0]['value'],
      $title, 
      $field_cta_link[0]['title']);
      */