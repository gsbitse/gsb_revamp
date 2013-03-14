<?php 

  printf("<div>%s</div>", $variables['field_gsb_quote_quote'][0]['safe_value']);
  print url($variables['field_gsb_quote_link'][0]['safe_value'], array('absolute' => TRUE));
  
  echo $variables['field_gsb_quote_name_title'][0]['safe_value'];
  if ($variables['field_gsb_quote_company_link'][0]['safe_value'] && $variables['field_gsb_quote_company_name'][0]['safe_value']) {
    print ' of ' . l($variables['field_gsb_quote_company_name'][0]['safe_value'], $variables['field_gsb_quote_company_link'][0]['safe_value'], array('absolute' => TRUE));
  }
  