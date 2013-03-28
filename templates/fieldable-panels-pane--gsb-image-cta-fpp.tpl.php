<?php
  $image = !empty($field_content_image) ? $field_content_image[0] : '';
  $position = strtolower($field_text_position[0]['value']);
  $color = strtolower($field_text_background_color[0]['value']);
  $link = !empty($field_image_cta_link[0]['url']) ? $field_image_cta_link[0]['url'] : '';
  $title = !empty($field_image_cta_link[0]['title']) ? $field_image_cta_link[0]['title'] : '';
  $summary = !empty($field_editorial_summary) ? $field_editorial_summary[0]['safe_value'] : '';
?>

<div class="designed-shadow image-cta <?php print $position . ' ' . $color; ?>">
  <?php if (!empty($image)): ?>
    <div class="image-cta__image"><?php print theme('image_style', array('path' => $image['uri'], 'style_name' => '570x400')); ?></div>
  <?php endif; ?>
  <?php if (!empty($title)): ?>
    <p class="image-cta__title"><?php print l($title, $link); ?></p>
  <?php endif; ?>
  <?php if (!empty($summary)): ?>
    <p class="image-cta__summary"><?php print l($summary, $link); ?><i></i></p>
  <?php endif; ?>
</div>