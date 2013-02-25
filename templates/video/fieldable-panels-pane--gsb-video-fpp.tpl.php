<?php /*
*  
* Gsb video fieldable panel pane tpl.
*
*/ ?>

<?php $videolink = '/video'; ?>
<?php
  if (!isset($field_gsb_video_video[0]['uri'])) {
    return;
  }
?>
<div class="gsb-video">
  <span class="gsb-video-border"></span>
  <?php if (!empty($field_gsb_video_video)) { ?>
    <div class="gsb-video-image">

      <?php
        // Get the file object for the video.

        $file = (object) $field_gsb_video_video[0];

        // Get the video path.

        $video_path = drupal_realpath($file->uri);

        // If it's a youtube video we need to use the embed url.
        if ($field_gsb_video_video[0]['filemime'] == 'video/youtube') {
          $video_parts = drupal_parse_url($video_path);
          if (stristr($video_parts['path'], 'watch')) {
            $video_path = str_replace('watch', 'embed', $video_parts['path']) . "/" . $video_parts['query']['v'];
          }
          $video_path .= '?autoplay=1';
        }

        // Create the image.

        $img_tag = theme_image_style(array(
          'style_name' => $content['field_gsb_video_video'][0]['file']['#style_name'],
          'path' => $content['field_gsb_video_video'][0]['file']['#path'],
          'alt' => $field_gsb_video_video[0]['filename'],
          'width' => NULL,
          'height' => NULL
        ));

        // Print a link wrapper for the lightbox, so that we can launch the video playback in a modal.

        print '<div class="field field-type-image field-name-field-gsb-video-media">';
        print l($img_tag, $video_path, array('attributes' => array('class' => 'fancybox fancybox.iframe'), 'html' => TRUE));
        print '<span class="video-play-icon"></span></div>';

      ?>
    </div>
  <?php } ?>

<div class="designed-box">
<div class="rendered-video"><?php

    // Print the video player
    if ($field_gsb_video_video != null) {
      $video_player = file_view($file, "default");
      print render($video_player);
    } ?>
</div>
<?php if (isset($variables['field_video_title'][0]['safe_value'])) { ?>
  <h4><a class="video-title" href="<?php print $videolink ?>"><?php 
    print $variables['field_video_title'][0]['safe_value'];
    ?>
    </a>
  </h4>
<?php } ?>
<?php if (isset($variables['field_video_description'][0]['safe_value'])) { ?>
  <p><?php 
    print $variables['field_video_description'][0]['safe_value'];
  ?></p>
<?php } ?>
<?php /*
for video button use:
 a class = "video-btn"
*/ ?>
</div>
</div>
