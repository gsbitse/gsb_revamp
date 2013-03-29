<?php 

/* Search Form Block */
function gsb_revamp_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    unset($form['search_block_form']['#title']);
    $form['search_block_form']['#title_display'] = 'invisible';
    $form['search_block_form']['#attributes']['class'][] = 'input-medium search-query';
	$form['search_block_form']['#attributes']['placeholder'] = t('search'); 
	/* unset($form['search_block_form']['#attributes']['placeholder']); */
    $form['actions']['submit']['#attributes']['class'][] = 'btn btn-search';
  }
}

function gsb_revamp_preprocess_panels_pane(&$vars) {
  if (!empty($vars['content']['#entity_type'])) {
  	$varscontent = $vars['content'];
   if ($varscontent['#entity_type'] == 'fieldable_panels_pane') {
   	if (!empty($varscontent['field_display_style'])) {
   		$vars['classes_array'][] = $varscontent['field_display_style']['#items'][0]['value'];
   	}
   }
  }
}

function gsb_revamp_fieldset($variables) {
  $element = $variables['element'];
  element_set_attributes($element, array('id'));
  _form_set_class($element, array('form-wrapper'));

  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
    $output .= '<legend><i class="colapse-icon"></i><span class="fieldset-legend">' . $element['#title'] . '</span></legend>';
  }
  $output .= '<div class="fieldset-wrapper">';
  if (!empty($element['#description'])) {
    $output .= '<div class="fieldset-description">' . $element['#description'] . '</div>';
  }
  $output .= $element['#children'];
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }
  $output .= '</div>';
  $output .= "</fieldset>\n";
  return $output;
}

function gsb_revamp_menu_tree(&$vars) {
  return '<ul class="gsb-nav menu">' . $vars['tree'] . '</ul>';
}

function gsb_revamp_menu_link(array $vars) {
  $element = $vars['element'];
  $sub_menu = '';
  
  if ($element['#below']) {
    // Ad our own wrapper
    unset($element['#below']['#theme_wrappers']);
    $sub_menu = '<ul class="gsb-dropdown-menu">' . drupal_render($element['#below']) . '</ul>';

    // Check if this element is nested within another

    // Set dropdown trigger element to # to prevent inadvertant page loading with submenu click
    $element['#localized_options']['attributes']['data-target'] = '#';
  }
  
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function gsb_revamp_menu_local_tasks(&$vars) {
  $output = '';

  if ( !empty($vars['primary']) ) {
    $vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $vars['primary']['#prefix'] = '<ul class="nav nav-tabs">';
    $vars['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['primary']);
  }

  if ( !empty($vars['secondary']) ) {
    $vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $vars['secondary']['#prefix'] = '<ul class="gsb-nav-pills">';
    $vars['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}

/**
 * Implementation of hook_preprocess_page()
 **/
function gsb_revamp_preprocess_page(&$vars) {
  // Get the first main menu tree
  // Add the rendered output to the $main_menu_expanded variables
  $vars['main_menu_collapsed'] = menu_tree_output(menu_tree_all_data('main-menu', NULL, 1));    
}

/**
 * Return formated date
 */
function _gsb_revamp_format_event_date($eventdate1, $eventdate2, $all_day, $format = 'default') {
  $dateoutput = '';

  $eventdate1 = strtotime($eventdate1);
  $eventdate2 = strtotime($eventdate2);

  /* if start date is not equal with end date */

  if ( $format == 'megamenu' ) {
    $monthday1 = date('F j, Y', $eventdate1);
    $monthday2 = date('F j, Y', $eventdate2);
  }
  elseif ( $format == 'eventdetail' ) {
    $monthday1 = date('M j', $eventdate1);
    $monthday2 = date('M j', $eventdate2);
  }
  else {
    $monthday1 = strtoupper(date('M j', $eventdate1));
    $monthday2 = strtoupper(date('M j', $eventdate2));
   }

  if ( $eventdate1 != $eventdate2 ) {
    if ( date('o M j', $eventdate1) != date('o M j', $eventdate2) ) {
      $dateoutput .= sprintf('<span>%s</span>%s – <span>%s</span>%s', date('l, ', $eventdate1), $monthday1, date('l, ', $eventdate2), $monthday2);
    } else {
      if ( $all_day == 1 ) {
        $dateoutput .= date('l, ', $eventdate1) . $monthday1;
      } else {
        $dateoutput .= sprintf('<span>%s</span>%s%s – %s', date('l, ', $eventdate1), $monthday1, date(', ga', $eventdate1), date('ga', $eventdate2));
      }
    }
  } elseif ( $eventdate1 == $eventdate2 ) {
    $dateoutput .= sprintf('<span>%s</span>%s', date('l, ', $eventdate1), date('M j, ga', $eventdate1));
  }
    
  elseif ( $all_day == 1 ) {
      $dateoutput .= sprintf('<span>%s</span>%s', date('l, ', $eventdate1), $monthday1);
    } else {
      $dateoutput .= sprintf('<span>%s</span>%s%s', date('l, ', $eventdate1), $monthday1, date(' ga', $eventdate1));
    }
  
  return $dateoutput;
}

/**
 * Returns array of all tags in variable
 */
function _gsb_revamp_get_tags($vars, $bizin) {
  $taxonomy_urls = array();
  $fields = array('field_business_insight_topic', 'field_discipline', 'field_industry', 'field_region', 'field_company_organization', 'field_programs');
  foreach ($fields as $field_name) {
    if (!empty($vars[$field_name])) {
      if ($bizin) { 
        if (empty($vars[$field_name][0])) {
          $name = taxonomy_term_load($vars[$field_name]['und'][0]['tid'])->name;
        } else {
          $name = $vars[$field_name][0]['taxonomy_term']->name;
        }
        $taxonomy_urls[] = '<a href="/business-insights/' . $name . '">' . $name . '</a>';
      } else {
        $taxonomy_urls[] = l($vars[$field_name][0]['taxonomy_term']->name, 'taxonomy/term/' . $vars[$field_name][0]['taxonomy_term']->tid);
      }
    }
  }
  return $taxonomy_urls;
}

function gsb_revamp_preprocess_node__gsb_event(&$variables, $hook) {
 $node = $variables['node'];
 $variables['eventtitle'] = $node->title;
 $variables['eventdate1'] = !empty($node->field_event_date) ? check_plain($variables['field_event_date'][0]['value']) : '';
 $variables['eventdate2'] = !empty($node->field_event_date) ?  check_plain($variables['field_event_date'][0]['value2']) : '';
 $variables['eventadress1'] = !empty($variables['field_address'][0]['thoroughfare']) ? check_plain($variables['field_address'][0]['thoroughfare']) : '';
 $variables['eventadress2'] = !empty($variables['field_address'][0]['premise']) ? check_plain($variables['field_address'][0]['premise']) : '';
 $variables['eventadress3'] = !empty($variables['field_address'][0]['value']) ? check_plain($variables['field_address'][0]['value']) : '';
 $variables['eventcity'] = !empty($variables['field_address'][0]['locality']) ? check_plain($variables['field_address'][0]['locality']) : '';
 $variables['eventstate'] = !empty($variables['field_address'][0]['administrative_area']) ? check_plain($variables['field_address'][0]['administrative_area']) : '';
 $variables['eventcountry'] = !empty($variables['field_address'][0]['country']) ? check_plain($variables['field_address'][0]['country']) : '';
 $variables['eventimage'] = !empty($variables['field_event_image']) ? $variables['field_event_image'][0] : '';
 $variables['editorialsummary'] = !empty($variables['field_editorial_summary']) ? $variables['field_editorial_summary'][0]['safe_value'] : '';
 $variables['dateoutput'] = _gsb_revamp_format_event_date($variables['eventdate1'], $variables['eventdate2'], $variables['field_all_day_event']['0']['value'], 'eventdetail');
}

function gsb_revamp_preprocess_node(&$variables, $hook) {
 $function = __FUNCTION__ . '__' . $variables['node']->type;
 if (function_exists($function)) {
   $function($variables, $hook);
 }
}

