<?php
/**
 * @file
 * Display Suite Species template.
 */
?>
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTaxonomy">
          <?php print t('Taxonomy'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseTaxonomy" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <?php print $taxonomy_1_1; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $taxonomy_1_2; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $taxonomy_1_3; ?>
          </div><!-- .col-md-4 -->
        </div><!-- .row -->
        <hr>
        <div class="row">
          <div class="col-md-6">
            <?php print $taxonomy_2_1; ?>
          </div><!-- .col-md-6 -->
          <div class="col-md-6">
            <?php print $taxonomy_2_2; ?>
          </div><!-- .col-md-6 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseTaxonomy .panel-collapse .collapse .in -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseCommonNames">
          <?php print t('Common names'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseCommonNames" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="row">
          <div class="col-md-4">
            <?php print $common_names_1_1; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $common_names_1_2; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $common_names_1_3; ?>
          </div><!-- .col-md-4 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseCommonNames .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseAssessmentInformation">
          <?php print t('Assessment information'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseAssessmentInformation" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <?php print $assessment_information_1_1; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $assessment_information_1_2; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $assessment_information_1_3; ?>
          </div><!-- .col-md-4 -->
        </div><!-- .row -->
        <hr>
        <div class="row">
          <div class="col-md-12">
            <?php print $assessment_information_2_1; ?>
          </div><!-- .col-md-12 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseAssessmentInformation .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseGlobalGeographicRange">
          <?php print t('Global geographic range'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseGlobalGeographicRange" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $global_geographic_range; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapseGlobalGeographicRange .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePopulationsPerInstrument">
          <?php print t('Population(s) per instrument'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapsePopulationsPerInstrument" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $populations_per_instrument; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapsePopulationsPerInstrument .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePopulationSizeAndTrend">
          <?php print t('Population size and trend'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapsePopulationSizeAndTrend" class="panel-collapse collapse">
      <div class="panel-body">
        <?php print $population_size_and_trend; ?>
      </div><!-- .panel-body -->
    </div><!-- #collapsePopulationSizeAndTrend .panel-collapse .collapse -->
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
        <hr>
        <div class="row">
          <div class="col-md-12">
            <?php print $related_content_2_1; ?>
          </div><!-- .col-md-12 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseRelatedContent .panel-collapse .collapse -->
  </div><!-- .panel .panel-default -->
</div><!-- #accordion .panel-group -->

<?php print $ungrouped; ?>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
