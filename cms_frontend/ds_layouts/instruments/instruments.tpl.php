<?php
/**
 * @file
 * Display Suite Instruments template.
 */
?>
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<div class="row">
  <div class="col-md-6">
    <?php print $ungrouped_1_1; ?>
  </div><!-- .col-md-6 -->
  <div class="col-md-6">
    <?php print $ungrouped_1_2; ?>
  </div><!-- .col-md-6 -->
</div><!-- .row -->
<div class="row">
  <div class="col-md-12">
    <?php print $ungrouped_2_1; ?>
  </div><!-- .col-md-12 -->
</div><!-- .row -->
<div class="row">
  <div class="col-md-4">
    <?php print $ungrouped_3_1; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $ungrouped_3_2; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $ungrouped_3_3; ?>
  </div><!-- .col-md-4 -->
</div><!-- .row -->
<hr>
<div class="row">
  <div class="col-md-6">
    <?php print $ungrouped_4_1; ?>
  </div><!-- .col-md-6 -->
  <div class="col-md-6">
    <?php print $ungrouped_4_2; ?>
  </div><!-- .col-md-6 -->
</div><!-- .row -->

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
