
<div class="container">
  <div class="row">
    <div class="country-profile-left profile col-md-8">
      <?php echo render($content['body']); ?>
      <div id="gmap" style="height: 300px;"></div>
      <?php
        render_slot($node, 'national_reports', 'cms_country', $content);
        render_slot($node, 'ratification_status', 'cms_country', $content);
      ?>
    </div>

    <div class="country-profile-right profile well col-md-4">
      <?php
          render_slot($node, 'details', 'cms_country', $content);
      ?>
    </div>
  </div>

  <div class="row">
    <div class="country-full-width profile col-md-12">
      <?php
        render_slot($node, 'related-content', 'cms_country', $content);
        hide($content['links']);
        hide($content['comments']);
      ?>
    </div>
  </div>
</div>
