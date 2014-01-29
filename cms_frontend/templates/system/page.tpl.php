
<header id="navbar" role="banner" class="navbar-default">

  <div class="container">
      <div class="row">   
      
        <div class="left-header col-md-1">     

  

          <div class="site-identity navbar-header">
            <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
            <?php endif; ?>  
       
            <!--.btn-navbar is used as the toggle for collapsed navbar content -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

        </div>   

        <div class="right-header col-md-11">
        
          <div class="up-area">
            <div class="top-user-menu">        
              <?php 
              $addblock = module_invoke('locale','block_view','language_content');
              print render($addblock['content']);
              print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('user-menu')), 'heading' => array('text' => t('Secondary menu'),'level' => 'h2','class' => array('element-invisible')))); 
              ?>    
            </div>  
            
            <div class="search-area-and-logos">
              <?php print render($page['header']); ?>
              <div class="small-logos">
                <a href="http://www.unep.org/" class="UNEP-logo"><?php print theme('image', array('path'=>drupal_get_path('theme', 'cms_frontend').'/images/UNEP_white_logo_32x34.png', 'alt'=>'UNEP logo')); ?></a>
                <a href="http://www.cms.int/" class="CMS-logo-small"><?php print theme('image', array('path'=>drupal_get_path('theme', 'cms_frontend').'/images/CMS_white_logo_32x34.png', 'alt'=>'CMS logo')); ?></a>
              </div>
            </div>
          </div>
          
          <div class="down-area">
            <?php if (!empty($site_slogan)): ?>
              <h1 class="portal-title navbar-brand"><?php print $site_slogan; ?></h1>
            <?php endif; ?>
          </div>

        </div>
      

    </div>
   </div> <!-- end div.container -->    
        
    <?php if (!empty($page['primary_menu'])): ?>
      <div class="global-menu-bar">
        <nav role="navigation">                   
          <?php if (!empty($page['primary_menu'])): ?>
            <?php print render($page['primary_menu']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?> 
    
    <!-- row for sub-menu -->
    <?php if(!empty($page['secondary_menu'])): ?>
    <div class="navbar navbar-inverse submenu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand mobile" href="#">CMS</a>
        </div>
        <?php print render($page['secondary_menu']); ?>
      </div>
    </div>
    <?php endif; ?>
    
    <!-- row for sub-sub-menu -->
    <?php if(!empty($page['tertiary_menu'])): ?>
    <div class="navbar navbar-inverse submenu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand mobile" href="#">CMS</a>
        </div>
        <?php print render($page['tertiary_menu']); ?>
      </div>
    </div>
    <?php endif; ?>

</header>
<!-- end page header -->
<div class="container">
  <div class="row">  
    
    <!--left column --> 
    <!-- UNCOMMENT this block if we have 3 columns -->
    <!--aside class="col-md-3 left-column" role="complementary">
    <div class="region region-sidebar-first well">
      <?php //if (!empty($page['sidebar_first'])): ?>
        <?php //print render($page['sidebar_first']); ?>
      <?php //endif; ?>
    </div>
    </aside-->
    
    <!-- center column --> 
    <div class="region col-md-8 center-column">            
      <?php if (!empty($page['highlighted'])): ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php endif; ?>
      <?php if (!empty($breadcrumb)): print '<div class="container">'.$breadcrumb.'</div>'; endif;?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>      
    </div> 
    
    
    <!-- right column-->
    <?php if (!empty($page['sidebar_second'])): ?>
    <aside class="col-md-4 right-column" role="complementary">
      <div class="well region region-sidebar-second">                
        <?php print render($page['sidebar_second']); ?>        
      </div>
    </aside>  
    <?php endif; ?>

  </div>  
</div>

<footer>
  <div class="well-footer subscribe-social">
    <div class="container">
      <div class="row">        
        <div class="col-md-12">
          <?php print render($page['footer_menu']); ?>           
        </div>
      </div>
    </div>
  </div>  
  <div class="well-footer subscribe-social">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <?php print render($page['footer_first_row_left']); ?>          
        </div>
        <div class="col-md-8">
          <?php print render($page['footer_first_row_right']); ?>           
        </div>
      </div>
    </div>
  </div>
  <div class="well-footer disclaimers">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <?php print render($page['footer_second_row_left']); ?>          
        </div>
        <div class="col-md-4">
          <?php print render($page['footer_second_row_right']); ?>          
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end pagefooter -->
