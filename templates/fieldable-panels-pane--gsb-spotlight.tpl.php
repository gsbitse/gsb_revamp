<?php  

?>
 <?php render($field_last_name); ?>
<?php if ($field_gsb_spotlight_person_type[0]['value'] !== 'Student') { ?>
 <?php render($field_title_position); ?>
<?php } ?>
<?php if ($field_gsb_spotlight_person_type[0]['value'] !== 'Faculty') { ?>
 <?php ?>
<?php } ?>
<?php ?>

<div class="designed-box spotlight spotlight-<?php print strtolower($field_gsb_spotlight_person_type[0]['value']) ?>">
  <span class="spotlight-border"></span>
  <span class="spotlight-type"><?php print $field_gsb_spotlight_person_type[0]['value'] ?> Spotlight</span>
  <h4 class="spotlight-name"><?php print $field_first_name[0]['safe_value'] . " " . $field_last_name[0]['safe_value']; ?></h4>
    <?php if ($field_gsb_spotlight_person_type[0]['value'] !== 'Student') { ?>
	    <h5 class="spotlight-position"><?php print $field_title_position[0]['safe_value']; ?></h5>
    <?php } ?>
    <?php if ($field_gsb_spotlight_person_type[0]['value'] !== 'Faculty') { ?>
    	<h5 class="spotlight-program"><?php print $content['field_program'][0]['#markup'] . ", Class of " . $content['field_graduation_year'][0]['#markup']; ?></h5>
    <?php } ?>
  <div class="spotlight-image">
  	    <?php
      // Make the file information an object.
      $file = (object) $field_gsb_spotlight_image_video[0];

      if ($file->type == 'image') {
        print render($content['field_gsb_spotlight_image_video']);
      }
      elseif ($file->type == 'video') {

        // Get the video path.
        $video_path = drupal_realpath($file->uri);

        // If it's a youtube video we need to use the embed url.
        if ($field_gsb_spotlight_image_video[0]['filemime'] == 'video/youtube') {
          $video_parts = drupal_parse_url($video_path);
          if (stristr($video_parts['path'], 'watch')) {
          	$video_path = str_replace('watch', 'embed', $video_parts['path']) . "/" . $video_parts['query']['v'];
          }
          $video_path .= '?autoplay=1';
          //$video_path = str_replace('watch?v=', 'embed/', $video_path) . '?autoplay=1';
        }

        // Create the image.
        render($content['field_gsb_spotlight_image_video']);
        $img_tag = theme_image_style(array('style_name' => $content['field_gsb_spotlight_image_video'][0]['file']['#style_name'], 'path' => $content['field_gsb_spotlight_image_video'][0]['file']['#path'], 'alt' => $field_gsb_spotlight_image_video[0]['filename'], 'width' => NULL, 'height' => NULL));

        // Print a link wrapper so that it can open in a modal.
        print '<div class="field field-type-image field-name-field-gsb-spotlight-media">';
        print l($img_tag, $video_path, array('attributes' => array('class' => 'fancybox fancybox.iframe'), 'html' => TRUE));
        print '<span class="video-play-icon"></span></div>';
      }

    ?>
  </div>
  <div class="spotlight-story">
  	<p><?php print $field_gsb_spotlght_desc_quote[0]['safe_value']; ?></p>
	</div>
	<a href="javascript:void(0)" class="show-more"><span></span>Show More</a>
	
</div>