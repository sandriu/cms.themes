<?php
/**
 * @file
 * Display Suite Documents template.
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

<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiles">
          <?php print t('Files'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseFiles" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $files; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapseFiles .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseRelatedContent">
          <?php print t('Related content'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseRelatedContent" class="panel-collapse collapse">
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
    </div><!-- #collapseRelatedContent .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->
</div><!-- #accordion .panel-group -->

<?php print $ungrouped; ?>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
