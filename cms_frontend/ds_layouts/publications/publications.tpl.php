<?php
/**
 * @file
 * Display Suite Publications template.
 */
?>
<?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<div id="accordion" class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseBibliographicInformation">
          <?php print t('Bibliographic information'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseBibliographicInformation" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-8">
            <?php print $bibliographic_information_1_1; ?>
          </div><!-- .col-md-8 -->
          <div class="col-md-4">
            <?php print $bibliographic_information_1_2; ?>
          </div><!-- .col-md-4 -->
        </div><!-- .row -->
        <div class="row">
          <div class="col-md-12">
            <?php print $bibliographic_information_2_1; ?>
          </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <hr>
        <div class="row">
          <div class="col-md-6">
            <?php print $bibliographic_information_3_1; ?>
          </div><!-- .col-md-6 -->
          <div class="col-md-6">
            <?php print $bibliographic_information_3_2; ?>
          </div><!-- .col-md-6 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseBibliographicInformation .panel-collapse .collapse .in -->
  </div><!-- .panel .panel-default -->

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
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDetails">
          <?php print t('Details'); ?>
        </a>
      </h4><!-- .panel-title -->
    </div><!-- .panel-heading -->
    <div id="collapseDetails" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <?php print $details_1_1; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $details_1_2; ?>
          </div><!-- .col-md-4 -->
          <div class="col-md-4">
            <?php print $details_1_3; ?>
          </div><!-- .col-md-4 -->
        </div><!-- .row -->
      </div><!-- .panel-body -->
    </div><!-- #collapseDetails .panel-collapse .collapse -->
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
