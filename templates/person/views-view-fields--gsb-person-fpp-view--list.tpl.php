<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php

$entityref = null;

if (isset($row->field_field_person_entity_ref[0]['raw']['entity'])) {
  $entityref = $row->field_field_person_entity_ref[0]['raw']['entity'];
}

$personnid = $entityref->nid;

$description = '';
$first_name = '';
$last_name = '';
$headshot = '';
$persontitle = '';
$persondep = '';

if (isset($row->field_field_description[0]['raw']['safe_value'])) {
 $description = $row->field_field_description[0]['raw']['safe_value'];
}

if ($entityref && isset($entityref->field_first_name['und'][0]['safe_value'])) {
  $first_name = $entityref->field_first_name['und'][0]['safe_value'];
}

if ($entityref && isset($entityref->field_last_name['und'])) {
  $last_name = $entityref->field_last_name['und'][0]['safe_value'];
}

if ($entityref && isset($entityref->field_headshot['und'][0])) {
  $headshot = $entityref->field_headshot['und'][0];
}

if ($entityref && isset($entityref->field_person_title['und'][0]['safe_value'])) {
  $persontitle = $entityref->field_person_title['und'][0]['safe_value'];
}

if ($entityref && isset($entityref->field_department['und'][0]['tid'])) {
  $persondep = $entityref->field_department['und'][0]['tid'];
}

if(!empty($headshot)) {
  $headshotstyle = array(
    'style_name' => 'medium',
    'path' => $headshot['uri'],
    'alt' => $headshot['alt'],
    'title' => $headshot['title'],
    'width' => '168',
    'height' => '168'
  );
}

?>

<div class="gsb-person-featured">
<a class="person-teaser-name" href="/node/<?php print $personnid ?>"><?php print $first_name . ' ' . $last_name ?></a>
<span class="person-title"><?php print $persontitle ?></span>
  <div class="person-description">
  <?php if(!empty($headshot)) { ?>
    <div class="person-image"><?php print theme_image_style($headshotstyle); ?></div>
  <?php } ?>
  <p class="person-quote"><?php print $description ?></p>
</div>
</div>

<?php /* foreach ($fields as $id => $field):
   if (!empty($field->separator)):
     print $field->separator;
   endif;

   print $field->wrapper_prefix;
     print $field->label_html;
    print $field->content;
   print $field->wrapper_suffix;
 endforeach; */ ?>
