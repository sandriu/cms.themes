<!-- page header -->
<?php require "page-header.tpl.php"; ?>

<!-- page container -->
<div class="container">
  <div class="row">  
        
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
      <?php
        if(!empty($page['before_content'])) {
          print render($page['before_content']);
        }
      ?>
      <?php print render($page['content']); ?>
      <?php
        if(!empty($page['after_content'])) {
          print render($page['after_content']);
        }
      ?>
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

<!-- page footer -->
<?php require "page-footer.tpl.php"; ?>
