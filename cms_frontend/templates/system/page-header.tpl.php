<header id="navbar" role="banner" class="navbar-default">

  <div class="container">
    <div class="row admin-search-logos">

        <div class="top-user-menu col-md-7">
          <?php
          $addblock = module_invoke('locale','block_view','language_content');
          print render($addblock['content']);
          print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('user-menu')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible'))));
          ?>
        </div>

        <div class="search-area-and-logos col-md-5">
          <?php print render($page['header']); ?>
          <div class="small-logos hidden-xs">
            <a href="http://www.unep.org/" class="UNEP-logo"><?php print theme('image', array('path'=>drupal_get_path('theme', 'cms_frontend').'/images/UNEP_white_logo_32x34.png', 'alt'=>'UNEP logo')); ?></a>
            <a href="http://www.cms.int/" class="CMS-logo-small"><?php print theme('image', array('path'=>drupal_get_path('theme', 'cms_frontend').'/images/CMS_white_logo_32x34.png', 'alt'=>'CMS logo')); ?></a>
          </div>
        </div>

    </div>

    <div class="row logo-title">

      <div class="site-identity navbar-header col-md-1">
        <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
        <?php endif; ?>

        <!--.btn-navbar is used as the toggle for collapsed navbar content -->
        <button type="button" class="navbar-toggle navbar-toggle-main-menu visible-xs">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="down-area col-md-11 hidden-xs">
        <?php if (!empty($site_name)): ?>
            <h1 class="portal-title"><?php print t($site_name); ?></h1>
        <?php endif; ?>
        <?php if (!empty($site_slogan)): ?>
            <p class="portal-subtitle"><?php print t($site_slogan); ?></p>
        <?php endif; ?>
      </div>

    </div>

   </div> <!-- end div.container -->

    <?php if (!empty($page['primary_menu'])): ?>
      <div class="global-menu-bar navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($page['primary_menu'])): ?>
            <?php print render($page['primary_menu']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>

</header>