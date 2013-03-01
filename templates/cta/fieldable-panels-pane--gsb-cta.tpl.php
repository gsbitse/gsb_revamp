<?php 
	if (!empty($field_cta_link[0]['title'])) {
	  print sprintf('<a href="%s" class="designed-box %s cta-link"><span class="cta-title">%s</span><b>%s', $field_cta_link[0]['url'], $field_cta_style[0]['value'], $field_cta_title[0]['value'], $field_cta_link[0]['title']);
		print '</b><i></i></a>';  
	}


  