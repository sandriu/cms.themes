<?php
/**
 * @file
 * Display Suite Species template.
 */
?>
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<div class="row">
  <div class="col-md-6">
    <?php print $region_1_1_1; ?>
  </div><!-- .col-md-6 -->
  <div class="col-md-6">
    <?php print $region_1_1_2; ?>
  </div><!-- .col-md-6 -->
</div><!-- .row -->
<hr>
<?php print $region_2; ?>
<hr>
<div class="row">
  <div class="col-md-4">
    <?php print $region_3_1_1; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-8">
    <?php print $region_3_1_2; ?>
  </div><!-- .col-md-8 -->
</div><!-- .row -->
<hr>
<?php print $region_4; ?>
<hr>
<div class="row">
  <div class="col-md-4">
    <?php print $region_5_1_1; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $region_5_1_2; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $region_5_1_3; ?>
  </div><!-- .col-md-4 -->
</div><!-- .row -->
<hr>
<div class="row">
  <div class="col-md-4">
    <?php print $region_6_1_1; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $region_6_1_2; ?>
  </div><!-- .col-md-4 -->
  <div class="col-md-4">
    <?php print $region_6_1_3; ?>
  </div><!-- .col-md-4 -->
</div><!-- .row -->

<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseBudgetLineBac">
          <?php print t('Budget line (BAC)'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseBudgetLineBac" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $budget_line_bac; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapseBudgetLineBac .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseActivity">
          <?php print t('Activity'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseActivity" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $activity; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapseActivity .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseScheduleOfPayments">
          <?php print t('Schedule of payments'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseScheduleOfPayments" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $schedule_of_payments; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapseScheduleOfPayments .panel-collapse .collapse -->
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

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
