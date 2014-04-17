<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="mobile-navigation">
    <nav role="mobile-navigation">
        <ul id="mobile-main-menu" class="menu nav">
        </ul>
    </nav>
</div>

<div class="row row-offcanvas row-offcanvas-left">
    <!-- page header -->
    <?php require "page-header.tpl.php"; ?>

    <!-- page container -->
    <div class="container">
        <!-- center column -->
        <div class="region col-md-8 center-column">
          <?php if (!empty($page['highlighted'])): ?>
            <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
          <?php endif; ?>

          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>

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

      <div class="row">
          <?php if (!empty($page['slide_instruments'])): ?>
            <div class="region col-md-12 center-column instruments-slideshow">
                <?php print render($page['slide_instruments']); ?>
            </div>
        <?php endif; ?>
      </div>

    <!-- page footer -->
    <?php require "page-footer.tpl.php"; ?>
</div>
