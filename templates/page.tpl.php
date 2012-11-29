<div id="skipnav" class="element-invisible">
  <div class="container">
    <p>Skip to:</p>
    <ul>
      <li><a href="#content" class="element-invisible element-focusable"><?php print t('Skip to content'); ?></a></li>
      <?php if ($main_menu): ?>
      <li><a href="#main-menu" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>
<!-- /#skipnav -->
<?php if ($logo || $site_name || $main_menu || $site_slogan || ($page['header']) || ($page['navigation']) || ($search)): ?>
<div id="header" class="clearfix">
  <div class="container">
    <div class="row">
      <div class="span12">
        <?php if ($logo): ?>
        <div id="logo" class="span3"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" role="presentation" /> </a></div>
        <!-- /#logo -->
        <?php endif; ?>
        <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan" class="offset2 span6">
          <?php if ($site_name): ?>
          <div id="site-name" class=""><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></div>
          <?php endif; ?>

         <!-- #main-menu -->
                <?php if ($main_menu): ?>
          <div id="main-menu" class="clearfix span6">
          
            <div class="navbar">
              <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <div class="nav-collapse"><?php print render($main_menu_expanded); ?></div>
              </div>
            </div>
          
          </div><?php endif; ?>
        <!-- /#main-menu -->


          <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>



        </div>

        <!-- /#name-and-slogan -->
        <?php endif; ?>
        <?php if ($page['header']): ?>
        <div id="header-content" class="row-fluid"><?php print render($page['header']); ?></div>
        <!-- /#header-content -->
        <?php endif; ?>


      <?php endif; ?>
      </div>
      <?php if ($page['navigation']): ?>
      <div id="navigation" class="span4"> <?php print render($page['navigation']); ?> </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- /#header -->


<div id="main" class="clearfix">
  <div class="container">
    <?php if ($breadcrumb): ?>
    <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
    <?php if ($page['main_top']): ?>
    <div id="main-top" class="row-fluid"> <?php print render($page['main_top']); ?> </div>
    <?php endif; ?>
    <?php if ($page['main_upper']): ?>
    <div id="main-upper" class="row-fluid"> <?php print render($page['main_upper']); ?> </div>
    <?php endif; ?>
    <div id="main-content" class="row">
      <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="sidebar span3">
        <div class="row-fluid"><?php print render($page['sidebar_first']); ?></div>
      </div>
      <!-- /#sidebar-first -->
      <?php endif; ?>
      <div id="content">
        <div id="content-wrapper">
          <div id="content-head" class="row-fluid">
            <div id="highlighted" class="clearfix"><?php print render($page['highlighted']); ?></div>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
            <h1 class="title" id="page-title"> <?php print $title; ?> </h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($tabs): ?>
            <div class="tabs"> <?php print render($tabs); ?> </div>
            <?php endif; ?>
            <?php if ($messages): ?>
            <div id="console" class="clearfix"><?php print $messages; ?></div>
            <?php endif; ?>
            <?php if ($page['help']): ?>
            <div id="help" class="clearfix"> <?php print render($page['help']); ?> </div>
            <?php endif; ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
          </div>
         
          <div id="content-body" class="row-fluid"> <?php print render($page['content']); ?> <?php print $feed_icons; ?> </div>
          
       
        </div>
        <!-- /#content-wrap --> 
      </div>
      <!-- /#content -->
      
    </div>
    
  </div>
</div>
<!-- /#main, /#main-wrapper -->


<?php if ($page['footer']): ?>
<div id="footer" class="clearfix">
  <div class="container">
    <div id="footer-content" class="row-fluid"> <?php print render($page['footer']); ?> </div>
  </div>
</div>
<!-- /#footer -->
<?php endif; ?>
