<?php 
//dpm(get_defined_vars());  
  //dpm($field_gsb_featured_item);
  //dpm($variables['field_gsb_featured_item']);

  
  // Get all titles and nodes
  foreach ($variables['field_gsb_featured_item'] as $key => $feature_item) {
    $imagestyle = '';
    $date = '';

    $title = $variables['elements']['field_gsb_featured_item'][$key]['entity']['field_collection_item'][$feature_item['value']]['field_gsb_feature_title'][0]['#markup'];
    $node = $variables['elements']['field_gsb_featured_item'][$key]['entity']['field_collection_item'][$feature_item['value']]['field_gsb_featured_reference']['#items'][0]['entity'];

    if (empty($title)) {
      $title = $node->title;
    }
    $node_url = url('node/' . $node->nid);  

    switch ($node->type) {
      case 'gsb_event':
        $image = $node->field_event_image[$node->language][0];
        $imagestyle = theme_image_style(array(
          'style_name' => 'gsb_event_168x100',
          'path' => $image['uri'],
          'alt' => $image['alt'],
          'title' => $image['title'],
          'width' => '268',
          'height' => '158',
        ));

        $date = _gsb_revamp_format_event_date($node->field_event_date[$node->language][0]['value'], $node->field_event_date[$node->language][0]['value2'], $node->field_all_day_event[$node->language]['0']['value'], 'megamenu');
        break;
      
      default:
        $date = format_date($node->created, 'medium_time');
        break;
    }

    echo $date;
    echo $imagestyle;
    echo $title;
    //dpm($node);
  }