<?php 

  $body = $variables['field_gsb_quote_quote'][0]['safe_value'];
  $link = !empty($variables['field_gsb_quote_link'][0]) ? $variables['field_gsb_quote_link'][0]['safe_value'] : '';
  $name = !empty($variables['field_gsb_quote_name_title'][0]) ? $variables['field_gsb_quote_name_title'][0]['safe_value'] : '';
  $company_name = !empty($variables['field_gsb_quote_company_name'][0]) ? $variables['field_gsb_quote_company_name'][0]['safe_value'] : '';
  $company_link = !empty($variables['field_gsb_quote_company_link'][0]) ? $variables['field_gsb_quote_company_link'][0]['safe_value'] : '';

  print '<div class="quote-wrapper">';
  if (!empty($link)) {
  	print '<a class="quote-link" href="' . url($variables['field_gsb_quote_link'][0]['safe_value'], array('absolute' => TRUE)) . '">';
  }
  if (!empty($body)) {
  	printf('<div class="quote-text"><i class="first">“</i>%s<i class="last">”</i></div>', $body);
  }
  if (!empty($link)) {
  	print '<i class="arrow"></i></a>';
  }
  print '<p class="quote-person">';
  if (!empty($name)) {
  	printf ('<span class="person-name">—%s</span>', $name);
  }
  if (!empty($company_name)) {
  	if (!empty($name)) {
  		printf ('<span> of </span>');
  	} else {
  		printf ('<span>—</span>');
  	}
  	if (!empty($company_link)) {
  		print l($company_name, $company_link, array('absolute' => TRUE));
  	} else {
  		printf('<span class="company-name">%s</span>', $company_name);
  	}
  }

  print '</p></div>';  