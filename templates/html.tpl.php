<?php
$front_heading_classes = theme_get_setting('front_heading_classes'); 
$breadcrumb_classes = theme_get_setting('breadcrumb_classes'); 
$border_classes = theme_get_setting('border_classes'); 
$corner_classes = theme_get_setting('corner_classes'); 
$body_bg_type = theme_get_setting('body_bg_type'); 
$body_bg_classes = theme_get_setting('body_bg_classes'); 
$body_bg_path = theme_get_setting('body_bg_path'); 
$user_perm = implode(' ', $user->roles);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <link rel="stylesheet/less" type="text/css" href="/<?php print drupal_get_path('theme', 'gsb_revamp'); ?>/less/styles.less" />
  <script type="text/javascript">
    less = {
        env: "development", // or "production"
        async: false,       // load imports async
        fileAsync: false,   // load imports async when in a page under
        poll: 1000,         // when in watch mode, time in ms between polls
        functions: {},      // user functions, keyed by name
        dumpLineNumbers: "comments", // or "mediaQuery" or "all"
        relativeUrls: false,// whether to adjust url's to be relative
        rootpath: ":/a.com/"// a path to add on to the start of every url
    };
  </script>
  <script src="/<?php print drupal_get_path('theme', 'gsb_revamp'); ?>/js/less-1.3.3.min.js" type="text/javascript"></script>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?> <?php print $user_perm; ?> <?php print $body_bg_type; ?> <?php print $body_bg_classes; ?> <?php print $front_heading_classes; ?> <?php print $breadcrumb_classes; ?> <?php print $border_classes; ?> <?php print $corner_classes; ?>" <?php print $attributes;?> <?php if ($body_bg_classes): ?>style="background: url('<?php print file_create_url(theme_get_setting('body_bg_path')); ?>') repeat top left;" <?php endif; ?>>
  <div id="page-container">
    <div id="header-container">
      <?php print $page_top; ?>
      <?php print $page; ?>
      <?php print $page_bottom; ?>
    </div>
  </div>

</body>

</html>