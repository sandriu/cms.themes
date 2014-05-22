<footer>
  <div class="well-footer footer-menu">
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
        <div class="col-md-4 col-sm-6">
          <?php print render($page['footer_first_row_left']); ?>
        </div>
        <div class="col-md-8 col-sm-6">
          <?php print render($page['footer_first_row_right']); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="well-footer disclaimers">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
            <?php print render($page['footer_second_row_left']); ?>
        </div>
        <div class="col-md-4 col-sm-12">
          <?php print render($page['footer_second_row_right']); ?>
        </div>
      </div>
    </div>
  </div>
    <span id="top-link-block" class="hidden">
        <a href="#top" class="btn btn-primary btn-sm">
            <i class="glyphicon glyphicon-chevron-up"></i>
            <?php echo t('Back to Top'); ?>
        </a>
    </span>
</footer>
