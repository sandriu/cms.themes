<?php
/**
 * @file
 * Display Suite Meetings template.
 */
?>
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<div class="row">
  <div class="col-md-8">
    <?php print $region_1_1_1; ?>
  </div><!-- .col-md-8 -->
  <div class="col-md-4">
    <?php print $region_1_1_2; ?>
  </div><!-- .col-md-4 -->
</div><!-- .row -->

<?php print $region_2; ?>

<div class="row">
  <div class="col-md-3">
    <?php print $region_3_1_1; ?>
  </div><!-- .col-md-3 -->
  <div class="col-md-3">
    <?php print $region_3_1_2; ?>
  </div><!-- .col-md-3 -->
  <div class="col-md-3">
    <?php print $region_3_1_3; ?>
  </div><!-- .col-md-3 -->
  <div class="col-md-3">
    <?php print $region_3_1_4; ?>
  </div><!-- .col-md-3 -->
</div><!-- .row -->
<hr>
<div class="row">
  <div class="col-md-8">
    <?php print $region_4_1_1; ?>
  </div><!-- .col-md-8 -->
  <div class="col-md-4">
    <?php print $region_4_1_2; ?>
  </div><!-- .col-md-4 -->
</div><!-- .row -->
<hr>
<div class="row">
  <div class="col-md-6">
    <?php print $region_5_1_1; ?>
  </div><!-- .col-md-6 -->
  <div class="col-md-6">
    <?php print $region_5_1_2; ?>
  </div><!-- .col-md-6 -->
</div><!-- .row -->
<hr>
<?php print $region_6; ?>

<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseRelatedContent">
          <?php print t('Related content'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseRelatedContent" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">
            <?php print $related_content_1_1; ?>
          </div><!-- .col-md-6 -->
          <div class="col-md-6">
            <?php print $related_content_1_2; ?>
          </div><!-- .col-md-6 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseRelatedContent .panel-collapse .collapse .in -->
  </div><!-- .panel .panel-default -->
</div><!-- #accordion .panel-group -->

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
