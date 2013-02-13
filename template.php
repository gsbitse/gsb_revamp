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
  return '<ul class="gsb-nav">' . $vars['tree'] . '</ul>';
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
