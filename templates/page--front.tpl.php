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
<div id="header" class="clearfix header-region">
  
      <div class="container">
        <?php if ($logo): ?>
        <div id="logo" class="span3"> <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" role="presentation" /> </a></div>
        <!-- /#logo -->
        <?php endif; ?>
        <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan" class="span8 row no-space float-right">
          <?php if ($site_name): ?>
          <div id="site-name" class=""><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></div>
          <?php endif; ?>


         <?php if ($main_menu): ?>
          <div id="main-menu" class="clearfix main-menu">
          
              <div class="site-navigation-content">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
                  <span class="icon-bar"></span> 
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse"><?php print render($main_menu_expanded); ?></div>
              </div>
          </div>

        <?php endif; ?>
        <!-- /#main-menu -->

         <div id="event-and-search" class="span2">
           <div id="event-calendar-cta" class="clearfix span2" style="">
            <a href="#">Event Calendar</a>
          </div>  
           

       

        <?php if ($page['header']): ?>
           <div id="header-content" class="row-fluid"><?php print render($page['header']); ?></div>
        <!-- /#header-content -->
        <?php endif; ?>

      </div>


        <?php if ($site_slogan): ?>
          <div id="site-slogan" class="span6 offset2 float-right"><p style="float: right;"><?php print $site_slogan; ?></p></div>
        <?php endif; ?>



        </div>



        <!-- /#name-and-slogan -->
        <?php endif; ?>
        
      <?php endif; ?>
      </div>
      <?php if ($page['navigation']): ?>
      <div id="navigation" class="span4"> <?php print render($page['navigation']); ?> </div>
      <?php endif; ?>
 
</div>
<!-- /#header -->


<div id="main" class="clearfix row " style="background-color:#e2e2e2;">
  <div class="container">
   
    <?php if ($page['main_top']): ?>
    <div id="main-top" class="row-fluid"> <?php print render($page['main_top']); ?> </div>
    <?php endif; ?>
    <?php if ($page['main_upper']): ?>
    <div id="main-upper" class="row-fluid"> <?php print render($page['main_upper']); ?> </div>
    <?php endif; ?>
    <div id="main-content" class="span12 row clear-row">
      
      <div id="content" class="span12 clear-row">
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
         
          <div id="content-body" class="row-fluid">
            <?php if ($breadcrumb): ?>
                  <div id="breadcrumb"><?php print $breadcrumb; ?></div>
                <?php endif; ?>

           <?php print render($page['content']); ?>
            <div id="row clear-row">
            

            <div id="homepage-feature" class="span9 clear-row" >

              <p class="homepage-feature-content span6 offset5">The Stanford GSB launches a new set of courses for incoming students</p>
            </div>
            <div class="menu-name-menu-audience-navigation span3" >
            <ul>
              <li class="audience-nav-mba"><a href="#">MBA Program</a></li>
              <li class="audience-nav-phd"><a href="#">PhD Program</a></li>
              <li class="audience-nav-msx"><a href="#">MSx Program</a></li>
              <li class="audience-nav-exed"><a href="#">Executive Education</a></li>
              <li class="audience-nav-all"><a href="#">See All Programs</a></li>
            </ul>
            </div>

            <div id="homepage-evergreen" class="span6 clear-row">
              <div id="homepage-evergreen-audience">
                <h3>MBA</h3>
              </div>
              <div id="homepage-evergreen-content">
                <p>Continued innovation in the Leadership Labs allows students more opportunity to practice skill and learn from professional coaches</p>
              </div>
            </div>

            <div id="social-block" class="span3">
              <div id="social-block-icons">
                    <ul class="span12">
                      <li class="social-block-twitter">Twitter</li>
                      <li class="social-block-youtube">YouTube</li>
                      <li class="social-block-linkedin">LinkedIn</li>
                      <li class="social-block-facebook">Facebook</li>
                    </ul>
              </div>
              <div id="social-block-content">
                  <div class="social-block-content-feed-name">
                    <p class="social-block-content-feed-name-school">Stanford Business</p>
                    <p class="social-block-content-feed-name-twitter">@StanfordBiz</p>
                  </div>
                  <div class="social-block-content-item">
                      <p class="social-block-content-item-text">Fusce volupat sceldrisqu dolor a sollicitudin. Nulla <a href="http://">link</a> cumsan blandit ut dignissim</p>
                      <p class="social-block-content-item-date">Tuesday Oct 20 </p>
                      <p class="social-block-content-item-elapsed">1 hr ago</p>
                  </div>
                   <div class="social-block-content-item">
                      <p class="social-block-content-item-text">Fusce volupat sceldrisqu dolor a sollicitudin. Nulla <a href="http://">link</a> cumsan blandit ut dignissim</p>
                      <p class="social-block-content-item-date">Tuesday Oct 20 </p>
                      <p class="social-block-content-item-elapsed">1 hr ago</p>
                  </div>

              
              </div>
            </div>

            <div id="homepage-events" class="span3">
              <h3>Upcoming Events</h3>
              <div class="homepage-event-item">
                  <p>
                    <span class="homepage-event-date">Oct 16</span>
                    <span class="homepage-event-location">Stanford, CA</span> - 
                    <span class="homepage-event-title">Stanford Finance Forum - Europe: Brave New World</span>
                  </p> 
              </div>
              <div class="homepage-event-item">
                  <p>
                    <span class="homepage-event-date">Oct 16</span>
                    <span class="homepage-event-location">Stanford, CA</span> - 
                    <span class="homepage-event-title">Stanford Finance Forum - Europe: Brave New World</span>
                  </p> 
              </div>
              <div class="homepage-event-item">
                  <p>
                    <span class="homepage-event-date">Oct 16</span>
                    <span class="homepage-event-location">Stanford, CA</span> - 
                    <span class="homepage-event-title">Stanford Finance Forum - Europe: Brave New World</span>
                  </p> 
              </div>
              <div class="homepage-event-item">
                  <p>
                    <span class="homepage-event-date">Oct 16</span>
                    <span class="homepage-event-location">Stanford, CA</span> - 
                    <span class="homepage-event-title">Stanford Finance Forum - Europe: Brave New World</span>
                  </p> 
              </div>
            </div>

            

          </div>
           <?php print $feed_icons; ?> </div>
          
       
        </div>
        <!-- /#content-wrap --> 
      </div>
      <!-- /#content -->
      
    </div>
    
  </div>
</div>
<!-- /#main, /#main-wrapper -->


<div id="homepage-footer-upper" style="background-color: #fff; " >
 <div class="container">
    <div id="homepage-footer-upper-container" class="row-fluid">
      <div id="latest-business-insights" class="span6">
        <h4>Latest Articles</h4>
        <div class="latest-b-i-item span6 clear-row">
          <h5>Why Peace Can Pay</h5>
          <p class="latest-b-i-byline">
            by James Vestibulum
          </p>
          <p class="latest-b-i-content"><span class="latest-b-i-date">Oct 9</span>An economist shows how financial innovation can help reduce ethnic violence.</p>

        </div>
        <div class="latest-b-i-item span6">
          <h5>Why Peace Can Pay</h5>
          <p class="latest-b-i-byline">
            by James Vestibulum
          </p>
          <p class="latest-b-i-content"><span class="latest-b-i-date">Oct 9</span>An economist shows how financial innovation can help reduce ethnic violence.</p>

        </div>
         <div class="latest-b-i-item span6 clear-row">
          <h5>Why Peace Can Pay</h5>
          <p class="latest-b-i-byline">
            by James Vestibulum
          </p>
          <p class="latest-b-i-content"><span class="latest-b-i-date">Oct 9</span>An economist shows how financial innovation can help reduce ethnic violence.</p>

        </div>
         <div class="latest-b-i-item span6">
          <h5>Why Peace Can Pay</h5>
          <p class="latest-b-i-byline">
            by James Vestibulum
          </p>
          <p class="latest-b-i-content"><span class="latest-b-i-date">Oct 9</span>An economist shows how financial innovation can help reduce ethnic violence.</p>

        </div>





      </div>
      <div id="alumni-news-block" class="span3">

        <h4>Alumni News</h4>
        <div class="alumni-news-item span12 clear-row">
            <p>Women Initiative's Network turns conversations into a vibrant network that shares ideas, resources and more. See how the Stanford GSB WiN group makes an impact. </p>
        </div>
      </div>
      <div id="giving-block" class="span3">
         <h4>The Impact of Giving</h4>
        <div class="giving-block-item span12 clear-row">
            <p>Giving enables Innovative new teach spaces enhancing the GSB experience. Students learn how to manage investments using Real-Time Analysis & Investment Lab </p>
        </div>
      </div>
    </div>
 </div>
</div>

<?php if ($page['footer']): ?>
<div id="footer" class="clearfix">
  <div class="container">
    <div id="footer-content" class="row-fluid"> <?php print render($page['footer']); ?> </div>
  </div>
</div>
<!-- /#footer -->
<?php endif; ?>
