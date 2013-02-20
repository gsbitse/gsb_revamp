<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<?php 

$speaker_array = array();
foreach ($variables['field_speakers'] as $key => $speaker_id) {
  $speaker = $variables['elements']['field_speakers'][$key]['entity']['field_collection_item'][$speaker_id['value']]['field_speaker'][
    '#items'][0]['entity'];
  $speaker_name = $speaker->field_first_name['und'][0]['safe_value'];
  $speaker_sname = $speaker->field_last_name['und'][0]['safe_value'];
  $speaker_url = !empty($speaker->field_url) ? $speaker->field_url['und'][0]['safe_value'] : 0;
  if ($speaker_url) {
    $speaker_array[] = '<a href="' . $speaker_url . '">' . $speaker_name . ' ' . $speaker_sname . '</a>';
  } else {
    $speaker_array[] = $speaker_name . ' ' . $speaker_sname;
  }
}
$speaker_output = implode(', ', $speaker_array);

$taxonomy_array = array();
foreach ($field_event_test_vocab_1 as $key => $tax_value) {
  $tax = taxonomy_term_load($field_event_test_vocab_1[$key]['tid']);
  $tax_tid = $tax->tid;
  $tax_name = $tax->name;
  $taxonomy_array[] = '<a href="/events/' . $tax_tid . '">' . $tax_name . '</a>';
}
$taxonomy_output = implode(', ', $taxonomy_array);

$eventtitle = $variables['title'];
$eventdate1 = !empty($variables['field_event_date']) ? strtotime($variables['field_event_date'][0]['value']) : '';
$eventdate2 = !empty($variables['field_event_date']) ?  strtotime($variables['field_event_date'][0]['value2']) : '';
$eventadress1 = !empty($variables['field_street_address_1']) ? $variables['field_street_address_1'][0]['value'] : '';
$eventadress2 = !empty($variables['field_street_address_2']) ? $variables['field_street_address_2'][0]['value'] : '';
$eventadress3 = !empty($variables['field_street_address_3']) ? $variables['field_street_address_3'][0]['value'] : '';
$eventcity = !empty($variables['field_city']) ? $variables['field_city'][0]['safe_value'] : '';
$eventstate = !empty($variables['field_state']) ? taxonomy_term_load($variables['field_state'][0]['tid'])->name : '';
$maplink = !empty($variables['field_map_url']) ? $variables['field_map_url'][0]['url'] : '';
$eventregisterlink = !empty($variables['field_register_url']) ? $variables['field_register_url'][0]['url'] : '';
$eventimage = !empty($variables['field_event_image']) ? $variables['field_event_image'][0] : '';
$eventtargetaudience = !empty($variables['field_target_audience']) ? $variables['field_target_audience'][0]['value'] : '';
$eventeditorialblurb = !empty($variables['field_editorial_blurb']) ? $variables['field_editorial_blurb'][0]['value'] : '';
$eventbody = !empty($variables['body']) ? $variables['body'][0]['safe_value'] : '';

if(!empty($eventimage)) {
  $eventimagestyle = array(
    'style_name' => 'event_detail_270x158',
    'path' => $eventimage['uri'],
    'alt' => $eventimage['alt'],
    'title' => $eventimage['title'],
    'width' => '268',
    'height' => '158',
  );
}

$dateoutput = '';
if ($eventdate1 != $eventdate2) {
  if (date('o M j', $eventdate1) != date('o M j', $eventdate2)) {
    $dateoutput .= '<span>'
    . date('l, ', $eventdate1)
    . '</span>'
    . strtoupper(date('M j', $eventdate1)) 
    . ' – ' 
    . '<span>'
    . date('l, ', $eventdate2)
    . '</span>'
    . strtoupper(date('M j', $eventdate2));
  } else {
    if ($row->field_field_all_day_event['0']['raw']['value'] == 1) {
      $dateoutput .= date('l, ', $eventdate1)
      . strtoupper(date('M j', $eventdate1));
    } else {
      $dateoutput .= '<span>'
      . date('l, ', $eventdate1)
      . '</span>'
      . strtoupper(date('M j', $eventdate1)) 
      . date(', ga', $eventdate1) 
      . ' – ' 
      . date('ga', $eventdate2);
    }
  }
} else {
  if ($row->field_field_all_day_event['0']['raw']['value'] == 1) {
    $dateoutput .= '<span>'
    . date('l, ', $eventdate1)
    . '</span>'
    . strtoupper(date('M j', $eventdate1));
  } else {
    $dateoutput .= '<span>'
    . date('l, ', $eventdate1)
    . '</span>'
    . strtoupper(date('M j,', $eventdate1))
    . date(' ga', $eventdate1);
  }
}

?>

<?php if ($view_mode == 'full') { ?>

<div class="event-innerpage <?php print $classes; ?>">
  <div class="event-innerpage-details">
    <p class="event-details-date"><?php print $dateoutput; ?></p>
    <h3 class="event-details-title"><?php print $eventtitle; ?></h3>
    <?php if ($speaker_output) { ?>
      <p class="event-details-speakers"><?php print $speaker_output ?></p>
    <?php } ?>
    <div class="event-adress-block">
      <p><b><?php print $eventadress1; ?></b>
        <span><?php print $eventadress2; ?></span>
        <span><?php print $eventadress3; ?></span>
        <span><?php 
        if (!empty($eventcity) && !empty($eventstate)) {
          print $eventcity . ', ' . $eventstate; 
        } else {
          print $eventcity . $eventstate;
        }
        ?></span>
      </p>
      <?php if ($maplink) { ?>
      <a class="view-map-link" href="<?php print $maplink; ?>">View Map</a>
      <?php } ?>
    </div>
    <div class="event-details-actions">
      <?php if($eventregisterlink) { ?>
      <a class="green-rounded-button" href="<?php print $eventregisterlink; ?>">Register</a>
      <?php } ?>
      <a class="green-rounded-button" href="/addtocalendar/<?php print $uid ?>">Add to My Calendar</a>
      <a class="green-rounded-button" href="#">Share</a>
    </div>
  </div>
  <div class="event-innerpage-description">
    <?php if (!empty($eventimage)) { ?>
    <div class="event-inner-image"><?php print theme_image_style($eventimagestyle); ?></div>
    <?php } ?>
    <?php if (!empty($eventtargetaudience)) { ?>
    <div class="event-target-audience"><span>Event is open to: </span>
      <?php print $eventtargetaudience; ?>
    </div>
    <?php } ?>
    <?php if (!empty($eventeditorialblurb)) { ?>
    <div class="event-editorial-blurb">
      <?php print $eventeditorialblurb; ?>
    </div>
    <?php } ?>
  </div>
  <div class="event-inner-body">
    <?php
    if (!empty($eventbody)) {
     print $eventbody; 
    } ?>
    <?php if (!empty($taxonomy_output)) { ?>
      <div class="event-taxonomy">
        <span>Tags: </span><?php print $taxonomy_output; ?>
      </div>
    <?php } ?>
  </div>
</div>

<?php } ?>