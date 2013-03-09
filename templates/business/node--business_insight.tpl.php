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

	$authors_array = array();
  foreach ($variables['field_authors'] as $key => $author_id) {
    $author = $variables['elements']['field_authors'][$key]['entity']['field_collection_item'][$author_id['value']];
    if ($author['field_author_reference'][0]['#markup'] != 'Other') {
      $author_ref = $author['field_author']['#items'][0]['entity'];
      $author_name = $author_ref->field_first_name['und'][0]['safe_value'];
      $author_sname = $author_ref->field_last_name['und'][0]['safe_value'];
      $author_url = !empty($author_ref->field_url) ? $author_ref->field_url['und'][0]['safe_value'] : 0;
      if ($author_url) {
        $authors_array[] = '<a href="' . $author_url . '">' . $author_name . ' ' . $author_sname . '</a>';
      } else {
        $authors_array[] = $author_name . ' ' . $author_sname;
      }
    } else {
      $author_name = $author['field_first_name'][0]['#markup'];
      $author_second = $author['field_last_name'][0]['#markup'];
      $authors_array[] = $author_name . ' ' . $author_second;
    }
  }

  $authors_output = implode(', ', $authors_array);
  $taxonomy_output = implode(', ', _gsb_revamp_get_tags($variables));

  $title = $variables['title'];
  $image = empty($variables['field_content_image']) ? '' : $variables['field_content_image'][0];
  $editorial_summary = $variables['field_editorial_summary'][0]['safe_value'];
  $date = date('l, M j, ga', strtotime($variables['field_date_published'][0]['value'])); 
  
  $imageclass = '';
  if(!empty($image)) {
    $eventimagestyle = array(
      'style_name' => 'sidebar_full_270x158',
      'path' => $image['uri'],
      'alt' => $image['alt'],
      'title' => $image['title'],
      'width' => '268',
      'height' => '158',
    );
  } else {
    $imageclass = 'no-image';
  }

  if ( $teaser ) { ?>
    <div class="cp-business-insight cp-block <?php print $imageclass; ?>">
      <span class="blue-small-border"></span>
      <?php if(!empty($image)) { ?>
        <div class="cp-image"><?php print theme_image_style($image); ?></div>
      <?php } ?>
      <div class="cp-content"><span class="cp-date"><?php print $date ?></span>
        <h4 class="cp-title"><i></i><?php printf('<a href="/node/%s">%s</a>', $nid, $title); ?></h4>
        <?php if ($authors_output) { ?>
          <span class="cp-author"><?php 
          print $authors_output; ?></span>
        <?php } ?>
        <?php ?>
        <div class="cp-body"><?php print $editorial_summary; ?></div>
        <span class="cp-taxonomy"><?php print $taxonomy_output; ?></span>
      </div>
    </div>
  <?php } 

  /*
  $image = 
  $title =
  $editorial_summary = 
  $date = 
  */