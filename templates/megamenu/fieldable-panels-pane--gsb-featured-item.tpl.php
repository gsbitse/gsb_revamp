<?php 

  // Get all titles and nodes
  printf( '<div class="mm-featured-header">%s</div>', t('Featured News') );
  foreach ($variables['field_gsb_featured_item'] as $key => $feature_item) {
    $imagestyle = '';
    $date = '';

    $node = $variables['elements']['field_gsb_featured_item'][$key]['entity']['field_collection_item'][$feature_item['value']]['field_gsb_featured_reference']['#items'][0]['entity'];
    $title = isset($variables['elements']['field_gsb_featured_item'][$key]['entity']['field_collection_item'][$feature_item['value']]['field_gsb_feature_title']) ? $variables['elements']['field_gsb_featured_item'][$key]['entity']['field_collection_item'][$feature_item['value']]['field_gsb_feature_title'][0]['#markup'] : $node->title;

    $node_url = url('node/' . $node->nid);

    switch ($node->type) {
      case 'gsb_event':
        $image = $node->field_event_image[$node->language][0];
        $image_url = $image['uri'];
        $image_alt = $image['alt'];
        $image_title = $image['alt'];

        $date = _gsb_revamp_format_event_date($node->field_event_date[$node->language][0]['value'], $node->field_event_date[$node->language][0]['value2'], $node->field_all_day_event[$node->language]['0']['value'], 'megamenu');
        break;

      case 'business_insight':
        $image = $node->field_content_image[$node->language][0];
        $image_url = $image['uri'];
        $image_alt = !empty($image['field_file_image_alt_text']) ? $image['field_file_image_alt_text'][$node->language][0]['safe_value'] : '';
        $image_title = !empty($image['field_file_image_title_text']) ? $image['field_file_image_title_text'][$node->language][0]['safe_value'] : '';
        $date = format_date(strtotime($node->field_date_published[$node->language][0]['value']), 'custom', 'l, F j, Y');
      break;

      case 'gsb_media_mention':
        $image = $node->field_content_image[$node->language][0];
        $image_url = $image['uri'];
        $image_alt = !empty($image['field_file_image_alt_text']) ? $image['field_file_image_alt_text'][$node->language][0]['safe_value'] : '';
        $image_title = !empty($image['field_file_image_title_text']) ? $image['field_file_image_title_text'][$node->language][0]['safe_value'] : '';
        $date = format_date(strtotime($node->field_date_published[$node->language][0]['value']), 'custom', 'l, F j, Y');
      break;  

      default:
        $date = format_date($node->created, 'medium_time');
        break;
    }

    $imagestyle = theme_image_style(array(
      'style_name' => 'megamenu_170x100',
      'path' => $image_url,
      'alt' => $image_alt,
      'title' => $image_title,
      'width' => '170',
      'height' => '100',
    ));    

    printf( '<div class="mm-featured"><div class="mm-featured-image">%s</div><div class="mm-featured-content"><span class="mm-featured-date">%s</span><a class="mm-featured-title" href="%s">%s</a></div></div>', 
      $imagestyle, $date, $node_url, $title );
  }