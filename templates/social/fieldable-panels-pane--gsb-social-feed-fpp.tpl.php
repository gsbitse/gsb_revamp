<?php /*
*  
* Gsb Social feed fieldable panel pane tpl.
*
*/ ?>

<?php if ($field_feed_source[0]['value'] == 'Twitter') { ?>
  <?php 
  /* define variables */
  $count = !empty($field_number_display_items) ? $field_number_display_items[0]['value'] : 3;
  $name = !empty($field_search_name) ? $field_search_name[0]['safe_value'] : 0;
  $format = 'l, M j | a';
  if ($name) { $link = 'http://twitter.com/' . $name; }
  else { $link = 'https://twitter.com/search?q=%23' . $tag; }
  ?>

  <div class="twitter-feed designed-box feed-bg">
    <a class="twitter-icon" href="<?php print $link; ?>">twitter-feed</a>
  </div>

  <?php 

  $toutput = 'gsb_tweetfeed.init({';
  if ($name) $toutput .= 'search: "'. $name .'",';
  $toutput .= 'numTweets: ' . $count . ',';
  $toutput .= 'appendTo: ".twitter-feed",';
  $toutput .= 'format: "' . $format . '"});';
  drupal_add_js($toutput,
    array('type' => 'inline', 'scope' => 'footer', 'weight' => 100));
  ?>
<?php } ?>