<?php 
	if (!empty($field_cta_link[0]['title'])) {
	  print sprintf('<div class="cta-block %s">', $field_cta_style[0]['value']);
	  $singleclass = empty($field_cta_description[0]['safe_value']) ? 'single' : '';

	  print sprintf('<a href="%s" class="cta-link %s">%s<i></i></a>', $field_cta_link[0]['url'], $singleclass, $field_cta_link[0]['title']);
	  if ($field_cta_description[0]['safe_value']) { 
	  	print '<div class="designed-box cta-description">';
		  if ($field_cta_title[0]['value']) {
		    print '<div class="cta-title">' . $field_cta_title[0]['value'] . '</div>';
		  } 
		  print '<div class="description">' . $field_cta_description[0]['safe_value'] . '</div></div>';

	  }
	}

  print '</div>';

  