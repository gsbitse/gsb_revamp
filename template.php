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
 /* 
 == 'fieldable_panels_pane
 dpm($vars['content']);
 $vars['classes_array'][] = $vars['content']['field_my_field']['#items'][0]['value']; */ 
}