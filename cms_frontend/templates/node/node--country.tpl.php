
<div class="container">
  <div class="row">
    <div class="country-profile-left profile col-md-8">
      <?php
          render_slot($node, 'related-content', 'cms_country', $content);

          hide($content['links']);
          hide($content['comments']);
      ?>
    </div>

    <div class="country-profile-right profile well col-md-4">
      <?php
          render_slot($node, 'details', 'cms_country', $content);
      ?>
    </div>
  </div>
</div>