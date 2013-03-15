<?php if ($teaser) { 

$imageclass = ''; 
$title = $variables['title'];
$summary = !empty($variables['field_editorial_summary']) ? $variables['field_editorial_summary'][0]['safe_value'] : '';
$date = !empty($variables['field_date_published']) ? date('l, M j, Y', strtotime($variables['field_date_published'][0]['value'])) : '';
$video = !empty($elements['field_video'][0]) ? $elements['field_video'][0] : '';

$taxonomy_output = implode(', ', _gsb_revamp_get_tags($variables, true)); 
$summary_trim = array(
    'max_length' => 125,
    'word_boundary' => true,
    'ellipsis' => true,
    'html' => true,
  );
?>
<div class="cp-video-block cp-block">
  <span class="blue-small-border"></span>
  <div class="cp-video"><?php

  if (!empty($video)) {
// Make the file information an object.
  $file = (object) $video['#file'];

  if ($file->type == 'image') {
    print render($variables['field_video']);
  }

  elseif ( $file->type == 'video' ) {
  // Get the video path.
    $video_path = drupal_realpath($file->uri);
  // If it's a youtube video we need to use the embed url.
    if ( $file->filemime == 'video/youtube' ) {
      $video_parts = drupal_parse_url($video_path);
      if ( stristr($video_parts['path'], 'watch') ) {
        $video_path = str_replace('watch', 'embed', $video_parts['path']) . "/" . $video_parts['query']['v'];
      }
      $video_path .= '?autoplay=1';
    }
  // Render the video 
  //render($video);
  
  // Create the image.  
    $img_tag = theme_image_style(array('style_name' => '270x158', 'path' => $video['file']['#path'], 'alt' => $video['#file']->filename, 'width' => NULL, 'height' => NULL));
  // Print a link wrapper so that it can open in a modal.
    print l($img_tag, $video_path, array('attributes' => array('class' => 'fancybox fancybox.iframe'), 'html' => TRUE));
    }  
  }
  ?><span class="video-play-icon"></span></div>
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