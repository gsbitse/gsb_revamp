<?php if ($teaser) { 

$imageclass = ''; 
$title = $variables['title'];
$image = !empty($variables['field_header_image']) ? $variables['field_header_image']['und'][0] : '';
$summary = !empty($variables['field_editorial_summary']) ? $variables['field_editorial_summary']['und'][0]['safe_value'] : '';
$date = !empty($variables['field_date_published']) ? date('l, M j, Y', strtotime($variables['field_date_published']['und'][0]['value'])) : '';

if(!empty($image)) {
  $imagestyle = array(
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

$taxonomy_output = implode(', ', _gsb_revamp_get_tags($variables, true)); 
$summary_trim = array(
    'max_length' => 125,
    'word_boundary' => true,
    'ellipsis' => true,
    'html' => true,
  );
?>
<div class="cp-school cp-block <?php print $imageclass; ?>">
  <span class="blue-small-border"></span>
  <?php if(!empty($image)) { ?>
    <div class="cp-image"><?php print theme_image_style($imagestyle); ?></div>
  <?php } ?>
  <div class="cp-content">
    <?php if (!empty($date)) { ?>
      <span class="cp-date"><?php print $date ?></span>
    <?php } ?>
    <h4 class="cp-title"><i></i><?php printf('<a href="/node/%s">%s</a>', $nid, $title); ?></h4>
    <?php if (!empty($summary)) { ?>
    <div class="cp-body"><?php print views_trim_text($summary_trim, $summary); ?></div>
    <?php } ?>    
    <span class="cp-taxonomy"><?php print $taxonomy_output; ?></span>
  </div>
</div>
<?php } ?>