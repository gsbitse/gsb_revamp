<?php /*
*  
* Gsb Social feed fieldable panel pane tpl.
*
*/ ?>

<?php if ($field_feed_source[0]['value'] == 'Twitter') { ?>
  <?php 
  /* define variables */
  $count = !empty($field_number_display_items) ? $field_number_display_items[0]['value'] : 3;
  $name = !empty($field_search_name) ? $field_search_name[0]['safe_value'] : '';
  $format = 'l, M j | a';
  $buttonname = !empty($field_source_link[0]) ? $field_source_link[0]['title'] : 'Learn more';
  $buttonlink = !empty($field_source_link[0]) ? $field_source_link[0]['url'] : '';
  $title = !empty($field_button_title[0]) ? $field_button_title[0]['safe_value'] : 'Title';
  if ($name) { $link = 'http://twitter.com/' . $name; }
  ?>
  
  <div class="twitter-feed designed-box feed-bg <?php if ($count < 3) { print 'bg'; } ?>">
    <a class="social-icon twitter-icon" href="<?php print $link; ?>">twitter-feed</a>
    <h5><?php print $title ?></h5>
    <p class="twitter-feed-source"><?php print $name ?></p>
    <div id="fpp-tweets-<?php print $id; ?>"></div>
    <a class="social-block-link" href="http://twitter.com/<?php print $name ?>">Join the conversation</a>
  </div>

  <?php 
  $toutput = 'gsb_tweetfeed.init({';
  if ($name) $toutput .= 'search: "'. $name .'",';
  $toutput .= 'numTweets: ' . $count . ',';
  $toutput .= 'appendTo: "#fpp-tweets-' . $id . '",';
  $toutput .= 'format: "' . $format . '"});';
  drupal_add_js($toutput,
    array('type' => 'inline', 'scope' => 'footer', 'weight' => 100));
  ?>
<?php } ?>