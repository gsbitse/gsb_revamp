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
      if (!empty($author['field_author_reference']) && $author['field_author_reference'][0]['#markup'] != 'Other') {
        $author_ref = $author['field_author']['#items'][0]['entity'];
        $author_name = !empty($author_ref->field_first_name['und']) ? $author_ref->field_first_name['und'][0]['safe_value'] : $author_ref->field_first_name[0]['safe_value'];
        $author_sname = $author_ref->field_last_name['und'][0]['safe_value'];
        if (!empty($author_ref->field_url)) {
          $author_url = !empty($author_ref->field_url['und']) ? $author_ref->field_url['und'][0]['safe_value'] : $author_ref->field_url[0]['safe_value'];
        }
        if ($author_url) {
          $authors_array[] = '<a href="' . $author_url . '">' . $author_name . ' ' . $author_sname . '</a>';
        } else {
          $authors_array[] = $author_name . ' ' . $author_sname;
        }
      } else {
        $author_name = !empty($author['field_first_name'][0]) ? $author['field_first_name'][0]['#markup'] : '';
        $author_second = !empty($author['field_last_name'][0]) ? $author['field_last_name'][0]['#markup'] : '';
        $authors_array[] = $author_name . ' ' . $author_second;
      }
    }
  $authors_output = implode(', ', $authors_array);
  $image = empty($variables['field_content_image']) ? '' : $variables['field_content_image'][0];
  $editorial_summary = $variables['field_editorial_summary'][0]['safe_value'];
  $date = date('l, M j, Y', strtotime($variables['field_date_published'][0]['value'])); 

  $imageclass = '';
  if(!empty($image)) {
    $bizinimage = array(
      'style_name' => '270x158',
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
  <?php
  $taxonomy_output = implode(', ', _gsb_revamp_get_tags($variables, true)); 
  $summary_trim = array(
      'max_length' => 125,
      'word_boundary' => true,
      'ellipsis' => true,
      'html' => true,
    );
  ?>
    <div class="cp-business-insight cp-block <?php print $imageclass; ?>">
      <span class="blue-small-border"></span>
      <?php if(!empty($image)) { ?>
        <div class="cp-image"><?php print theme_image_style($bizinimage); ?></div>
        <a href="/business-insights" class="bi-section-link">Business Insights</a>
      <?php } ?>
      <div class="cp-content"><span class="cp-date"><?php print $date ?></span>
        <h4 class="cp-title"><i></i><?php printf('<a href="/node/%s">%s</a>', $nid, $title); ?></h4>
        <?php if ($authors_output) { ?>
          <span class="cp-author"><span>by </span><?php 
          print $authors_output; ?></span>
        <?php } ?>
        <?php ?>
        <div class="cp-body"><?php print views_trim_text($summary_trim, $editorial_summary); ?></div>
        <span class="cp-taxonomy"><?php print $taxonomy_output; ?></span>
      </div>
    </div>
  <?php } else { ?>
  <?php 
    $taxonomy_output = implode(', ', _gsb_revamp_get_tags($variables, false)); 
    $body = $body[0]['safe_value'];
    $imagecaption = !empty($field_content_image_caption) ?  $field_content_image_caption[0]['safe_value'] : '';
  ?>
    <div class="business-insights-inner">
      <div class="bizin-header">
        <div class="bizin-title">
          <p class="bi-date"><?php print $date ?></p>
          <h3 class="bi-title"><?php print $title ?></h3>
        </div>
        <?php if(!empty($image)) { ?>
        <div class="bizin-image">
          <?php print theme_image_style($bizinimage); ?>
          <?php if ($imagecaption) { ?> 
            <p class="bi-image-title"><?php print $imagecaption ?></p>
          <?php } ?>
        </div>
        <?php } ?>        
      </div>
      <div class="bizin-content">
        <div class="tags"><span>Tags: </span><span class="all-tags"><?php print $taxonomy_output ?></span></div>
        <div class="bizin-body">
          <p class="bi-editorial"><?php print $editorial_summary ?></p>
          <div class="bi-body"><?php print $body ?></div>
        </div>
        <div class="bizin-authors">
          <?php print '—by ' . $authors_output; ?>
        </div>
      </div>
    </div>
  <?php } 

  /*
  $image = 
  $title =
  $editorial_summary = 
  $date = 
  */