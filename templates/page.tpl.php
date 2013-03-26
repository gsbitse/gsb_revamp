<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */
?>

<div id="page">

  <header role="banner" class="clearfix">
    <div class="banner-wrapper">
      <?php if($navigation = render($page['navigation'])): ?>
        <div class="nav-wrapper">
          <nav role="navigation">
            <h1 class="offscreenText">Site Navigation</h1>
            <div id="nav-container">
              <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
              <?php endif; ?>
              <div id="nav-touch-wrapper">
                <!-- <a id="nav-touch-button">Menu</a> -->
                <?php print $navigation; ?>
              </div>
            </div>
          </nav>
        </div>
         <!-- /nav -->
      <?php endif; ?>

      <?php if($header = render($page['header'])): ?>
        <h1 class="offscreenText">Site Header</h1>
        <?php print $header; ?>
      <?php endif; ?>

    </div>
  </header> <!-- /header -->

  <div role="main">
    <?php  if ($breadcrumb): ?>
      <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
    <?php endif; ?>

    <?php print render($page['highlighted']); ?>
    <a id="main-content"></a>


    <?php print $messages; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($tabs = render($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
  </div> <!-- /main -->

  <?php if($footer = render($page['footer'])): ?>
    <div class="footer-wrapper">
      <h1 class="offscreenText">Site Footer</h1>
      <?php if($footer_menu = render($page['footer_menu'])): ?>
        <?php print $footer_menu; ?>
      <?php endif; ?>
      <?php print $footer; ?>
    </div> <!-- /footer-wrapper -->
  <?php endif; ?>

</div> <!-- /#page -->
